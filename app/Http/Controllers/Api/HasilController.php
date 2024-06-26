<?php

namespace App\Http\Controllers\Api;

use App\Helper\Metode;
use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\HasilDetail;
use App\Models\Kriteria;
use Exception;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $saveMetode = Metode::getPerhitunganMetodeHasil();
            if ($saveMetode) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil ambil data',
                    'result' => $saveMetode['metode']
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal ambil data',
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
