<?php

namespace App\Http\Controllers\Admin;


use App\Helper\Check;
use App\Helper\Metode;
use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\HasilDetail;
use App\Models\SelesaiTest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


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
            $getCurrentUrl = Check::getCurrentUrl();
            if (!isset(Check::getMenu($getCurrentUrl)[0])) {
                abort(403, 'Cannot access page');
            }
            $getMenu = Check::getMenu($getCurrentUrl)[0];

            session()->put('userAcess.is_create', $getMenu->is_create);
            session()->put('userAcess.is_update', $getMenu->is_update);
            session()->put('userAcess.is_delete', $getMenu->is_delete);

            $saveMetode = Metode::getPerhitunganMetode($request);
            return view('admin.metode.index', $saveMetode['metode']);
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 400);
        }
    }
    public function store(Request $request)
    {
        try {
            //code...
            $validator = Validator::make($request->all(), [
                'tanggal_selesai_test' => 'required',
                'judul_selesai_test' => 'required',
                'keterangan_selesai_test' => 'required',
            ], [
                'required' => ':attribute wajib diisi',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'message' => 'invalid form validation',
                    'result' => [
                        'error' => $validator->errors(),
                        'request' => $request->all()
                    ]
                ], 400);
            }
            DB::beginTransaction();
            $data = [
                'tanggal_selesai_test' => Check::convertDate($request->input('tanggal_selesai_test')),
                'judul_selesai_test' => $request->input('judul_selesai_test'),
                'keterangan_selesai_test' => $request->input('keterangan_selesai_test'),
            ];
            $insert = SelesaiTest::create($data);
            $selesai_test_id = $insert->id;

            $alternatif = [];
            $saveMetode = Metode::getPerhitunganMetode($request);
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
                    'selesai_test_id' => $selesai_test_id
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

            DB::commit();
            if ($insert || $hasil || $hasil_detail) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil menambahkan data',
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal menambahkan data',
                ], 400);
            }
        } catch (Exception $e) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 400);
        }
    }
}
