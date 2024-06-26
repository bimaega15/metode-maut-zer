<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use File;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('auth.register', [
            'role' => Role::all()
        ]);
    }

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'username' => [
                'required', function ($attribute, $value, $fail) use ($request) {
                    $username = $request->input('username');
                    $checkusername = User::where('username', $username)->count();
                    if ($checkusername > 0) {
                        $fail('Username sudah digunakan');
                    }
                }
            ],
            'password' => ['required',  function ($attribute, $value, $fail) use ($request) {
                $password = $request->input('password');
                $password_confirm = $request->input('password_confirm');
                if ($password_confirm != $password) {
                    $fail('Password tidak sama dengan password confirmation');
                }
            },],
            'password_confirm' => ['required',  function ($attribute, $value, $fail) use ($request) {
                $password = $request->input('password');
                $password_confirm = $request->input('password_confirm');
                if ($password_confirm != $password) {
                    $fail('Password tidak sama dengan password confirmation');
                }
            },],
            'nama_profile' => 'required',
            'email_profile' => 'required|email',
            'nohp_profile' => 'required|numeric',
            'jenis_kelamin_profile' => 'required',
            'logo_konfigurasi' => 'image|max:2048',

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
                'result' => $validator->errors()
            ], 400);
        }

        // users
        $dataUsers = [
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ];
        $user_id = User::create($dataUsers);

        // roles
        $getRoles = Role::where('nama_roles', 'like', '%' . 'siswa' . '%')->first();
        $dataRoles = [
            'role_id' => $getRoles->id,
            'user_id' => $user_id->id,
        ];
        $roleUser = RoleUser::create($dataRoles);

        // biodata
        $file = $request->file('gambar_profile');
        $gambar_profile = $this->uploadFile($file);
        $dataBiodata = [
            'users_id' => $user_id->id,
            'nama_profile' => $request->input('nama_profile'),
            'email_profile' => $request->input('email_profile'),
            'alamat_profile' => $request->input('alamat_profile'),
            'nohp_profile' => $request->input('nohp_profile'),
            'jenis_kelamin_profile' => $request->input('jenis_kelamin_profile'),
            'gambar_profile' => $gambar_profile,
        ];
        $profile = Profile::create($dataBiodata);

        $data = array_merge($dataUsers, $dataRoles, $dataBiodata);
        if ($user_id || $roleUser || $profile) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil tambah account data <br>
                <strong>Silahkan login</strong>
                ',
                'result' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal tambah account data',
            ], 400);
        }
    }

    private function uploadFile($file, $users_id = null)
    {
        if ($file != null) {
            // delete file
            $this->deleteFile($users_id);
            // nama file
            $fileExp =  explode('.', $file->getClientOriginalName());
            $name = $fileExp[0];
            $ext = $fileExp[1];
            $name = time() . '-' . str_replace(' ', '-', $name) . '.' . $ext;

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'upload/profile/';

            // upload file
            $file->move($tujuan_upload, $name);
        } else {
            if ($users_id == null) {
                $name = 'default.png';
            } else {
                $user = Profile::where('users_id', $users_id)->first();
                $name = $user->gambar_profile;
            }
        }

        return $name;
    }

    private function deleteFile($users_id = null)
    {
        if ($users_id != null) {
            $profile = Profile::where('users_id', '=', $users_id)->first();
            $gambar = public_path() . '/upload/profile/' . $profile->gambar_profile;
            if (file_exists($gambar)) {
                if ($profile->gambar_profile != 'default.png') {
                    File::delete($gambar);
                }
            }
        }
    }
}
