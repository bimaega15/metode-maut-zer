<?php

namespace App\Http\Controllers\Admin;


use App\Helper\Check;
use App\Http\Controllers\Controller;
use App\Models\Kriteria;
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
            $getCurrentUrl = Check::getCurrentUrl();
            if (!isset(Check::getMenu($getCurrentUrl)[0])) {
                abort(403, 'Cannot access page');
            }
            $getMenu = Check::getMenu($getCurrentUrl)[0];

            session()->put('userAcess.is_create', $getMenu->is_create);
            session()->put('userAcess.is_update', $getMenu->is_update);
            session()->put('userAcess.is_delete', $getMenu->is_delete);


            if ($request->ajax()) {
                $userAcess = session()->get('userAcess');

                $data = SubKriteria::with('kriteria')->get();
                $result = [];
                $no = 1;
                if ($data->count() == 0) {
                    $result['data'] = [];
                }

                foreach ($data as $index => $v_data) {
                    $buttonUpdate = '';
                    if ($userAcess['is_update'] == '1') {
                        $buttonUpdate = '
                        <a href="' . route('admin.subKriteria.edit', $v_data->id) . '" class="btn btn-outline-warning m-b-xs btn-edit" style="border-color: #f5af47ea !important;">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        ';
                    }
                    $buttonDelete = '';
                    if ($userAcess['is_delete'] == '1') {
                        $buttonDelete = '
                        <form action=' . route('admin.subKriteria.destroy', $v_data->id) . ' class="d-inline">
                        <button type="submit" class="btn-delete btn btn-outline-danger m-b-xs" style="border-color: #f75d6fd8 !important;">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                        ';
                    }
                    $button = '
                <div class="text-center">
                ' . $buttonUpdate . '               
                ' . $buttonDelete . '               
                </div>
                ';

                    $result['data'][] = [
                        $no++,
                        $v_data->kode_sub_kriteria,
                        $v_data->nama_sub_kriteria,
                        $v_data->bobot_sub_kriteria,
                        $v_data->kriteria->kode_kriteria . ' ' . $v_data->kriteria->nama_kriteria,
                        trim($button)
                    ];
                }

                return response()->json($result, 200);
            }

            $data['kriteria'] = Kriteria::all();
            return view('admin.subKriteria.index', $data);
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
                'kode_sub_kriteria' => ['required', function ($attribute, $value, $fail) use ($request) {
                    $kodeSubKriteria = $request->input('kode_sub_kriteria');
                    $checkKodeSubKriteria = SubKriteria::where('kode_sub_kriteria', $kodeSubKriteria)->count();
                    if ($checkKodeSubKriteria > 0) {
                        $fail('Kode sub kriteria sudah digunakan');
                    }
                }],
                'nama_sub_kriteria' => 'required',
                'bobot_sub_kriteria' => 'required',
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
                'bobot_sub_kriteria' => $request->input('bobot_sub_kriteria'),
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
        try {
            //code...
            $validator = Validator::make($request->all(), [
                'kode_sub_kriteria' => ['required', function ($attribute, $value, $fail) use ($request) {
                    $kodeSubKriteria = $request->input('kode_sub_kriteria');
                    $id = $request->input('id');
                    $checkKodeSubKriteria = SubKriteria::where('kode_sub_kriteria', $kodeSubKriteria)
                        ->where('id', '!=', $id)
                        ->count();
                    if ($checkKodeSubKriteria > 0) {
                        $fail('kode SubKriteria sudah digunakan');
                    }
                }],
                'nama_sub_kriteria' => 'required',
                'bobot_sub_kriteria' => 'required',
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
                'bobot_sub_kriteria' => $request->input('bobot_sub_kriteria'),
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
