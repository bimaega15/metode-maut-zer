<?php

namespace App\Http\Controllers\Api;

use App\Helper\Check;
use App\Http\Controllers\Controller;
use App\Models\SubKriteria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Undefined;

class SubKriteriaController extends Controller
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
            $data = new SubKriteria();
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
                'kode_sub_kriteria' => ['required', function ($attribute, $value, $fail) {
                    $kodeSubKriteria = $_POST['kode_sub_kriteria'];
                    $checkKodeSubKriteria = SubKriteria::where('kode_sub_kriteria', $kodeSubKriteria)->count();
                    if ($checkKodeSubKriteria > 0) {
                        $fail('Kode sub kriteria sudah digunakan');
                    }
                }],
                'nama_sub_kriteria' => 'required',
                'kriteria_id' => 'required',
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
                'kode_sub_kriteria' => $request->input('kode_sub_kriteria'),
                'nama_sub_kriteria' => $request->input('nama_sub_kriteria'),
                'kriteria_id' => $request->input('kriteria_id'),
            ];
            $insert = SubKriteria::create($data);
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
            $SubKriteria = SubKriteria::with('kriteria')->find($id);
            if ($SubKriteria) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil ambil data',
                    'result' => $SubKriteria,
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
                'kode_sub_kriteria' => ['required', function ($attribute, $value, $fail) {
                    $kodeSubKriteria = $_POST['kode_sub_kriteria'];
                    $id = $_POST['id'];
                    $checkKodeSubKriteria = SubKriteria::where('kode_sub_kriteria', $kodeSubKriteria)
                        ->where('id', '!=', $id)
                        ->count();
                    if ($checkKodeSubKriteria > 0) {
                        $fail('kode SubKriteria sudah digunakan');
                    }
                }],
                'nama_sub_kriteria' => 'required',
                'kriteria_id' => 'required',
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
                'kode_sub_kriteria' => $request->input('kode_sub_kriteria'),
                'nama_sub_kriteria' => $request->input('nama_sub_kriteria'),
                'kriteria_id' => $request->input('kriteria_id'),
            ];
            $update = SubKriteria::find($id)->update($data);

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
            $delete = SubKriteria::destroy($id);
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
            $number = SubKriteria::select(DB::raw('max(kode_sub_kriteria) as kode_sub_kriteria'))->first();
            if ($number != '' && $number != null) {
                $getKodeSubKriteria = ($number->kode_sub_kriteria);
                $getKodeSubKriteria = str_replace('S', '', $getKodeSubKriteria);
                $getKodeSubKriteria = (int)  $getKodeSubKriteria;
                $getKodeSubKriteria++;
                $getAutoNumber = 'S' . sprintf("%03s", $getKodeSubKriteria);
            } else {
                $getAutoNumber = 'S001';
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
