<?php

namespace App\Http\Controllers\Api;

use App\Helper\Metode;
use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\HasilDetail;
use Exception;
use Illuminate\Http\Request;

class MetodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $saveMetode = Metode::getPerhitunganMetode($request);
            if ($request->input('submitHasil')) {
                $alternatif = [];
                $ranking = $saveMetode['metode']['ranking'];
                foreach ($ranking as $alternatif_id => $value) {
                    $alternatif[] = $alternatif_id;
                }
                $checkHasil = Hasil::whereIn('alternatif_id', $alternatif)->count();
                if ($checkHasil > 0) {
                    Hasil::whereIn('alternatif_id', $alternatif)->delete();
                }

                $hasil = [];
                $rank = 1;
                $hasilBagiSub = $saveMetode['metode']['hasilBagi'];
                foreach ($saveMetode['metode']['ranking'] as $alternatif_id => $value) {
                    $insertHasil = [
                        'alternatif_id' => $alternatif_id,
                        'total_hasil' => $value,
                        'ranking_hasil' => $rank,
                    ];
                    $hasil = Hasil::create($insertHasil);
                    $hasil_id = $hasil->id;

                    $insertHasilDetail = [];
                    foreach ($hasilBagiSub[$alternatif_id] as $kriteria_id => $value) {
                        $insertHasilDetail[] = [
                            'hasil_id' => $hasil_id,
                            'kriteria_id' => $kriteria_id,
                            'nilai_hasil_detail' => $value
                        ];
                    }
                    $hasil_detail = HasilDetail::insert($insertHasilDetail);
                    $rank++;
                }

                if ($insertHasil || $insertHasilDetail) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Berhasil menyimpan hasil',
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 400,
                        'message' => 'Gagal menyimpan hasil',
                    ], 400);
                }
            }
            if ($saveMetode) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil menyelesaikan metode',
                    'result' => $saveMetode['metode']
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal menyelesaikan metode',
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 400);
        }
    }
}
