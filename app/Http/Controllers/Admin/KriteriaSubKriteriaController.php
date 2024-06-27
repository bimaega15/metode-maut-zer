<?php

namespace App\Http\Controllers\Admin;


use App\Helper\Check;
use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\KriteriaSubkriteria;
use App\Models\SubKriteria;
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
            $getCurrentUrl = Check::getCurrentUrl();
            if (!isset(Check::getMenu($getCurrentUrl)[0])) {
                abort(403, 'Cannot access page');
            }
            $getMenu = Check::getMenu($getCurrentUrl)[0];

            session()->put('userAcess.is_create', $getMenu->is_create);
            session()->put('userAcess.is_update', $getMenu->is_update);
            session()->put('userAcess.is_delete', $getMenu->is_delete);

            $userAcess = session()->get('userAcess');

            if ($request->ajax()) {
                $userAcess = session()->get('userAcess');

                $data = Alternatif::all();
                $result = [];
                $no = 1;
                if ($data->count() == 0) {
                    $result['data'] = [];
                }

                foreach ($data as $index => $v_data) {
                    $buttonAction = '';
                    $countAlternatif = KriteriaSubkriteria::where('alternatif_id', $v_data->id)->count();
                    if ($countAlternatif == 0) {
                        if ($userAcess['is_create'] == '1') {
                            $buttonAction = '
                        <a href="#" class="btn btn-outline-primary m-b-xs btn-add" style="border-color: #7888fc !important;" data-bs-toggle="modal" data-bs-target="#modalPenilaian" data-id="' . $v_data->id . '">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                        ';
                        }
                    } else {
                        if ($userAcess['is_update'] == '1') {
                            $buttonAction = '
                        <a href="#" class="btn btn-outline-warning m-b-xs btn-edit" style="border-color: #f5af47ea  !important;" data-bs-toggle="modal" data-bs-target="#modalPenilaian" data-id="' . $v_data->id . '">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        ';
                        }
                    }

                    $button = '
                <div class="text-center">
                ' . $buttonAction . '         
                </div>
                ';


                    $url_gambar_alternatif = asset('storage/upload/alternatif/' . $v_data->gambar_alternatif);
                    $gambar_alternatif = '<a class="photoviewer" href="' . $url_gambar_alternatif . '" data-gallery="photoviewer" data-title="' . $v_data->gambar_alternatif . '">
                    <img src="' . $url_gambar_alternatif . '" width="100%;"></img>
                </a>';

                    $result['data'][] = [
                        $no++,
                        $v_data->nip_alternatif,
                        $v_data->nama_alternatif,
                        $v_data->email_alternatif,
                        $v_data->alamat_alternatif,
                        $v_data->nohp_alternatif,
                        $v_data->jenis_kelamin_alternatif == 'L' ? 'Laki-laki' : 'Perempuan',
                        $gambar_alternatif,
                        trim($button)
                    ];
                }

                return response()->json($result, 200);
            }
            $data['kriteria'] = Kriteria::with('subKriteria')->get();
            $dataSubKriteria = SubKriteria::all();
            $arraySubKriteria = [];
            foreach ($dataSubKriteria as $key => $value) {
                $arraySubKriteria[$value->kriteria_id][] = $value;
            }
            $data['subKriteria'] = $arraySubKriteria;
            $data['jsonSubKriteria'] = json_encode($dataSubKriteria);
            return view('admin.kriteriaSubkriteria.index', $data);
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
                'alternatif_id' => 'required',
                'kriteria_id' => ['required', function ($attribute, $value, $fail) use ($request) {
                    $kriteria_id = $request->input('kriteria_id');
                    $explode_kriteria_id = explode(',', $kriteria_id);
                    foreach ($explode_kriteria_id as $key => $value) {
                        if ($value == null) {
                            $fail('Kriteria tidak boleh kosong');
                        }
                    }
                }],
                'sub_kriteria_id' => ['required', function ($attribute, $value, $fail) use ($request) {
                    $sub_kriteria_id = $request->input('sub_kriteria_id');
                    $explode_sub_kriteria_id = explode(',', $sub_kriteria_id);
                    foreach ($explode_sub_kriteria_id as $key => $value) {
                        if ($value == null) {
                            $fail('Sub kriteria tidak boleh kosong');
                        }
                    }
                }],
                'nilai_kriteria_subkriteria' => ['required', function ($attribute, $value, $fail) use ($request) {
                    $nilai_kriteria_subkriteria = $request->input('nilai_kriteria_subkriteria');
                    $explode_nilai_kriteria_subkriteria = explode(',', $nilai_kriteria_subkriteria);
                    foreach ($explode_nilai_kriteria_subkriteria as $key => $value) {
                        if ($value == null) {
                            $fail('Penilaian masih ada yang kosong');
                        }
                    }
                }],
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

            $alternatif_id = $request->input('alternatif_id');
            $sub_kriteria_id = $request->input('sub_kriteria_id');
            $nilai_kriteria_subkriteria = $request->input('nilai_kriteria_subkriteria');

            $data_sub_kriteria_id = explode(',', $sub_kriteria_id);
            $data_nilai_kriteria_subkriteria = explode(',', $nilai_kriteria_subkriteria);
            $data = [];
            foreach ($data_sub_kriteria_id as $key => $v_sub_kriteria_id) {
                # code...
                $dataSubKriteria = SubKriteria::find($v_sub_kriteria_id);
                $data[] = [
                    'kriteria_id' => $dataSubKriteria->kriteria_id,
                    'sub_kriteria_id' => $v_sub_kriteria_id,
                    'alternatif_id' => $alternatif_id,
                    'nilai_kriteria_subkriteria' => $data_nilai_kriteria_subkriteria[$key],
                ];
            }


            $insert = KriteriaSubKriteria::insert($data);
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
            $KriteriaSubKriteria = KriteriaSubKriteria::with('kriteria', 'subKriteria', 'alternatif')
                ->where('alternatif_id', $id)
                ->get();
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
    public function update(Request $request, $alternatif_id)
    {
        try {
            //code...
            $validator = Validator::make($request->all(), [
                'kriteria_id' => ['required', function ($attribute, $value, $fail) use ($request) {
                    $kriteria_id = $request->input('kriteria_id');
                    $explode_kriteria_id = explode(',', $kriteria_id);
                    foreach ($explode_kriteria_id as $key => $value) {
                        if ($value == null) {
                            $fail('Kriteria tidak boleh kosong');
                        }
                    }
                }],
                'sub_kriteria_id' => ['required', function ($attribute, $value, $fail) use ($request) {
                    $sub_kriteria_id = $request->input('sub_kriteria_id');
                    $explode_sub_kriteria_id = explode(',', $sub_kriteria_id);
                    foreach ($explode_sub_kriteria_id as $key => $value) {
                        if ($value == null) {
                            $fail('Sub kriteria tidak boleh kosong');
                        }
                    }
                }],
                'nilai_kriteria_subkriteria' => ['required', function ($attribute, $value, $fail) use ($request) {
                    $nilai_kriteria_subkriteria = $request->input('nilai_kriteria_subkriteria');
                    $explode_nilai_kriteria_subkriteria = explode(',', $nilai_kriteria_subkriteria);
                    foreach ($explode_nilai_kriteria_subkriteria as $key => $value) {
                        if ($value == null) {
                            $fail('Penilaian masih ada yang kosong');
                        }
                    }
                }],
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

            // delete dahulu
            KriteriaSubkriteria::where('alternatif_id', $alternatif_id)->delete();

            $sub_kriteria_id = $request->input('sub_kriteria_id');
            $nilai_kriteria_subkriteria = $request->input('nilai_kriteria_subkriteria');

            $data_sub_kriteria_id = explode(',', $sub_kriteria_id);
            $data_nilai_kriteria_subkriteria = explode(',', $nilai_kriteria_subkriteria);
            $data = [];
            foreach ($data_sub_kriteria_id as $key => $v_sub_kriteria_id) {
                # code...
                $dataSubKriteria = SubKriteria::find($v_sub_kriteria_id);
                $data[] = [
                    'kriteria_id' => $dataSubKriteria->kriteria_id,
                    'sub_kriteria_id' => $v_sub_kriteria_id,
                    'alternatif_id' => $alternatif_id,
                    'nilai_kriteria_subkriteria' => $data_nilai_kriteria_subkriteria[$key],
                ];
            }


            $update = KriteriaSubKriteria::insert($data);
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
