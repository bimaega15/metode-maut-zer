<?php

namespace App\Http\Controllers\Api;

use App\Helper\Check;
use App\Http\Controllers\Controller;
use App\Models\KriteriaSubkriteria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Undefined;

class KriteriaSubKriteriaController extends Controller
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
            $data = new KriteriaSubKriteria();
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
                'kriteria_id' => 'required',
                'sub_kriteria_id' => 'required',
                'alternatif_id' => ['required', function ($attribute, $value, $fail) {
                    $alternatif = $_POST['alternatif_id'];
                    $checkAlternatif = KriteriaSubkriteria::where('alternatif_id', $alternatif)->count();
                    if ($checkAlternatif > 0) {
                        $fail('Alternatif sudah diinput nilainya');
                    }
                }],
                'nilai_kriteria_subkriteria' => 'required',
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
                'kriteria_id' => $request->input('kriteria_id'),
                'sub_kriteria_id' => $request->input('sub_kriteria_id'),
                'alternatif_id' => $request->input('alternatif_id'),
                'nilai_kriteria_subkriteria' => $request->input('nilai_kriteria_subkriteria'),
            ];
            $insert = KriteriaSubKriteria::create($data);
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
            $KriteriaSubKriteria = KriteriaSubKriteria::with('kriteria', 'subKriteria', 'alternatif')->find($id);
            if ($KriteriaSubKriteria) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil ambil data',
                    'result' => $KriteriaSubKriteria,
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
                'kriteria_id' => 'required',
                'sub_kriteria_id' => 'required',
                'alternatif_id' => ['required', function ($attribute, $value, $fail) {
                    $alternatif = $_POST['alternatif_id'];
                    $id = $_POST['id'];
                    $checkAlternatif = KriteriaSubkriteria::where('alternatif_id', $alternatif)
                        ->where('id', '!=', $id)->count();
                    if ($checkAlternatif > 0) {
                        $fail('Alternatif sudah diinput nilainya');
                    }
                }],
                'nilai_kriteria_subkriteria' => 'required',
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
                'kriteria_id' => $request->input('kriteria_id'),
                'sub_kriteria_id' => $request->input('sub_kriteria_id'),
                'alternatif_id' => $request->input('alternatif_id'),
                'nilai_kriteria_subkriteria' => $request->input('nilai_kriteria_subkriteria'),
            ];
            $update = KriteriaSubKriteria::find($id)->update($data);

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
            $delete = KriteriaSubKriteria::destroy($id);
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
}
