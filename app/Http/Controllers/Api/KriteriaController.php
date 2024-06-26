<?php

namespace App\Http\Controllers\Api;

use App\Helper\Check;
use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Undefined;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            //code...
            $data = new Kriteria();
            $limit = $request->input('limit') == null ? 10 : $request->input('limit');
            $getData = $data->getData($request->all(), $limit);
            if ($getData) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil ambil data',
                    'result' => $getData
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal kesalahan data',
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //code...
            $validator = Validator::make($request->all(), [
                'kode_kriteria' => ['required', function ($attribute, $value, $fail) {
                    $kodeKriteria = $_POST['kode_kriteria'];
                    $checkKodeKriteria = Kriteria::where('kode_kriteria', $kodeKriteria)->count();
                    if ($checkKodeKriteria > 0) {
                        $fail('kode kriteria sudah digunakan');
                    }
                }],
                'nama_kriteria' => 'required',
                'bobot_kriteria' => ['required', 'numeric'],
            ], [
                'required' => ':attribute wajib diisi',
                'numeric' => ':attribute wajib nomor',
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
                'kode_kriteria' => $request->input('kode_kriteria'),
                'nama_kriteria' => $request->input('nama_kriteria'),
                'definisi_kriteria' => $request->input('definisi_kriteria'),
                'bobot_kriteria' => $request->input('bobot_kriteria'),
            ];
            $insert = Kriteria::create($data);
            DB::commit();
            if ($insert) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil insert data',
                    'result' => $request->all(),
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal insert data',
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try {
            //code...
            $Kriteria = Kriteria::find($id);
            if ($Kriteria) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil ambil data',
                    'result' => $Kriteria,
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal ambil data',
                ], 400);
            }
        } catch (Exception $e) {
            //throw $th;
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $_POST['id'] = $id;
        try {
            //code...
            $validator = Validator::make($request->all(), [
                'kode_kriteria' => ['required', function ($attribute, $value, $fail) {
                    $kodeKriteria = $_POST['kode_kriteria'];
                    $id = $_POST['id'];
                    $checkKodeKriteria = Kriteria::where('kode_kriteria', $kodeKriteria)
                        ->where('id', '!=', $id)
                        ->count();
                    if ($checkKodeKriteria > 0) {
                        $fail('kode kriteria sudah digunakan');
                    }
                }],
                'nama_kriteria' => 'required',
                'bobot_kriteria' => ['required', 'numeric'],
            ], [
                'required' => ':attribute wajib diisi',
                'numeric' => ':attribute wajib nomor',
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
                'kode_kriteria' => $request->input('kode_kriteria'),
                'nama_kriteria' => $request->input('nama_kriteria'),
                'definisi_kriteria' => $request->input('definisi_kriteria'),
                'bobot_kriteria' => $request->input('bobot_kriteria'),
            ];
            $update = Kriteria::find($id)->update($data);

            DB::commit();
            if ($update) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil update data',
                    'result' => $request->all(),
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal update data',
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            DB::beginTransaction();
            $delete = Kriteria::destroy($id);
            DB::commit();
            if ($delete) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil delete data',
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal delete data',
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
    public function autoNumber()
    {
        try {
            //code...
            $number = Kriteria::select(DB::raw('max(kode_kriteria) as kode_kriteria'))->first();
            if ($number != '' && $number != null) {
                $getKodeKriteria = ($number->kode_kriteria);
                $getKodeKriteria = str_replace('K', '', $getKodeKriteria);
                $getKodeKriteria = (int)  $getKodeKriteria;
                $getKodeKriteria++;
                $getAutoNumber = 'K' . sprintf("%03s", $getKodeKriteria);
            } else {
                $getAutoNumber = 'K001';
            }
            if ($number) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil ambil data',
                    'result' => $getAutoNumber
                ], 200);
            } else {
                return response()->json([
                    'status' => 200,
                    'message' => 'Gagal ambil data',
                ], 200);
            }
        } catch (Exception $e) {
            //throw $th;
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 400);
        }
    }
}
