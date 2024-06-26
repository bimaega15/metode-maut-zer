<?php

namespace App\Http\Controllers\Admin;


use App\Helper\Check;
use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Undefined;
use File;

class AlternatifController extends Controller
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

                $data = Alternatif::all();
                $result = [];
                $no = 1;
                if ($data->count() == 0) {
                    $result['data'] = [];
                }

                foreach ($data as $index => $v_data) {
                    $buttonUpdate = '';
                    if ($userAcess['is_update'] == '1') {
                        $buttonUpdate = '
                        <a href="' . route('admin.alternatif.edit', $v_data->id) . '" class="btn btn-outline-warning m-b-xs btn-edit" style="border-color: #f5af47ea !important;">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        ';
                    }
                    $buttonDelete = '';
                    if ($userAcess['is_delete'] == '1') {
                        $buttonDelete = '
                        <form action=' . route('admin.alternatif.destroy', $v_data->id) . ' class="d-inline">
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

                    $url_gambar_alternatif = asset('/storage/upload/alternatif/' . $v_data->gambar_alternatif);
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

            return view('admin.alternatif.index');
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
                'nama_alternatif' => 'required',
                'nip_alternatif' => ['required', function ($attribute, $value, $fail) {
                    $nipAlternatif = $_POST['nip_alternatif'];
                    $checknipAlternatif = Alternatif::where('nip_alternatif', $nipAlternatif)->count();
                    if ($checknipAlternatif > 0) {
                        $fail('Nip sudah digunakan');
                    }
                }],
                'email_alternatif' => ['required', 'email', function ($attribute, $value, $fail) {
                    $emailAlternatif = $_POST['email_alternatif'];
                    $checkEmailAlternatif = Alternatif::where('email_alternatif', $emailAlternatif)->count();
                    if ($checkEmailAlternatif > 0) {
                        $fail('Email sudah digunakan');
                    }
                }],
                'alamat_alternatif' => 'required',
                'nohp_alternatif' => ['required', 'numeric'],
                'jenis_kelamin_alternatif' => ['required'],
                'gambar_alternatif' => 'image|max:2048',
            ], [
                'required' => ':attribute wajib diisi',
                'numeric' => ':attribute harus berupa angka',
                'email' => ':attribute tidak valid',
                'image' => ':attribute harus berupa gambar',
                'max' => ':attribute tidak boleh lebih dari :max',
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
            $gambar_alternatif = $this->uploadFile($request);
            $data = [
                'nama_alternatif' => $request->input('nama_alternatif'),
                'nip_alternatif' => $request->input('nip_alternatif'),
                'email_alternatif' => $request->input('email_alternatif'),
                'alamat_alternatif' => $request->input('alamat_alternatif'),
                'nohp_alternatif' => $request->input('nohp_alternatif'),
                'jenis_kelamin_alternatif' => $request->input('jenis_kelamin_alternatif'),
                'gambar_alternatif' => $gambar_alternatif,
            ];
            $insert = Alternatif::create($data);
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
            $Alternatif = Alternatif::find($id);
            if ($Alternatif) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil ambil data',
                    'result' => $Alternatif,
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
        $_POST['id'] = $id;
        try {
            //code...
            $validator = Validator::make($request->all(), [
                'nama_alternatif' => 'required',
                'nip_alternatif' => ['required', function ($attribute, $value, $fail) {
                    $nipAlternatif = $_POST['nip_alternatif'];
                    $id = $_POST['id'];
                    $checknipAlternatif = Alternatif::where('nip_alternatif', $nipAlternatif)
                        ->where('id', '!=', $id)
                        ->count();
                    if ($checknipAlternatif > 0) {
                        $fail('Nip sudah digunakan');
                    }
                }],
                'email_alternatif' => ['required', 'email', function ($attribute, $value, $fail) {
                    $emailAlternatif = $_POST['email_alternatif'];
                    $id = $_POST['id'];
                    $checkEmailAlternatif = Alternatif::where('email_alternatif', $emailAlternatif)
                        ->where('id', '!=', $id)
                        ->count();
                    if ($checkEmailAlternatif > 0) {
                        $fail('Email sudah digunakan');
                    }
                }],
                'alamat_alternatif' => 'required',
                'nohp_alternatif' => ['required', 'numeric'],
                'jenis_kelamin_alternatif' => ['required'],
                'gambar_alternatif' => 'image|max:2048',
            ], [
                'required' => ':attribute wajib diisi',
                'numeric' => ':attribute harus berupa angka',
                'email' => ':attribute tidak valid',
                'image' => ':attribute harus berupa gambar',
                'max' => ':attribute tidak boleh lebih dari :max',
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
            $gambar_alternatif = $this->uploadFile($request, $id);
            $data = [
                'nama_alternatif' => $request->input('nama_alternatif'),
                'nip_alternatif' => $request->input('nip_alternatif'),
                'email_alternatif' => $request->input('email_alternatif'),
                'alamat_alternatif' => $request->input('alamat_alternatif'),
                'nohp_alternatif' => $request->input('nohp_alternatif'),
                'jenis_kelamin_alternatif' => $request->input('jenis_kelamin_alternatif'),
                'gambar_alternatif' => $gambar_alternatif,
            ];
            $update = Alternatif::find($id)->update($data);
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
            $this->deleteFile($id);
            $delete = Alternatif::destroy($id);
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


    private function uploadFile($request, $id = null)
    {
        if ($request->gambar_alternatif && $request->gambar_alternatif->isValid()) {
            // delete file
            $this->deleteFile($id);

            $file = $request->gambar_alternatif->store('public/upload/alternatif');
            $path_gambar_alternatif = explode('/', $file);
            $index_gambar_alternatif = count($path_gambar_alternatif) - 1;
            $gambar_alternatif = $path_gambar_alternatif[$index_gambar_alternatif];

            $name = $gambar_alternatif;
        } else {
            if ($id == null) {
                $name = 'default.png';
            } else {
                $alternatif = Alternatif::find($id);
                $name = $alternatif->gambar_alternatif;
            }
        }

        return $name;
    }


    private function deleteFile($id = null)
    {
        if ($id != null) {
            $alternatif = Alternatif::where('id', '=', $id)->first();
            $gambar = public_path() . '/storage/upload/alternatif/' . $alternatif->gambar_alternatif;
            if (file_exists($gambar)) {
                if ($alternatif->gambar_alternatif != 'default.png') {
                    File::delete($gambar);
                }
            }
        }
    }
}
