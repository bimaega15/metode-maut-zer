<?php

namespace App\Http\Controllers\Api;

use App\Helper\Check;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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
            $getData =  User::with('profile', 'roles')->first();
            if ($getData) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil ambil data',
                    'result' => $getData
                ], 200);
            } else {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil ambil data',
                    'result' => $getData
                ], 200);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            //code...
            //
            $validator = Validator::make($request->all(), [
                'username' => [
                    'required', function ($attribute, $value, $fail) {
                        $username = $_POST['username'];
                        $id = $_POST['id'];
                        $checkusername = User::where('username', $username)
                            ->where('id', '!=', $id)
                            ->count();
                        if ($checkusername > 0) {
                            $fail('Username sudah digunakan');
                        }
                    }
                ],
                'password' => [function ($attribute, $value, $fail) {
                    $password = $_POST['password'];
                    $password_confirm = $_POST['password_confirm'];
                    if ($password != null && $password_confirm != null) {
                        if ($password_confirm != $password) {
                            $fail('Password tidak sama dengan password confirmation');
                        }
                    }
                },],
                'password_confirm' => [function ($attribute, $value, $fail) {
                    $password = $_POST['password'];
                    $password_confirm = $_POST['password_confirm'];
                    if ($password != null && $password_confirm != null) {
                        if ($password_confirm != $password) {
                            $fail('Password tidak sama dengan password confirmation');
                        }
                    }
                },],
                'role_id' => 'required',
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
                    'result' => [
                        'error' => $validator->errors(),
                        'request' => $request->all()
                    ]
                ], 400);
            }
            DB::beginTransaction();

            // users
            $password_db = $request->input('password_old');
            $password = $request->input('password');
            if ($password != null) {
                $password_db = Hash::make($password);
            }
            $dataUsers = [
                'username' => $request->input('username'),
                'password' => $password_db,
            ];
            $user_id = User::find($id)->update($dataUsers);

            // roles
            $dataRoles = [
                'role_id' => $request->input('role_id'),
                'user_id' => $id,
            ];
            $roleUser = RoleUser::where('user_id', $id)->update($dataRoles);

            // biodata
            $file = $request->file('gambar_profile');
            $gambar_profile = $this->uploadFile($file, $id);
            $dataBiodata = [
                'users_id' => $id,
                'nama_profile' => $request->input('nama_profile'),
                'email_profile' => $request->input('email_profile'),
                'alamat_profile' => $request->input('alamat_profile'),
                'nohp_profile' => $request->input('nohp_profile'),
                'jenis_kelamin_profile' => $request->input('jenis_kelamin_profile'),
                'gambar_profile' => $gambar_profile,
            ];
            $profile = Profile::where('users_id', $id)->update($dataBiodata);

            DB::commit();
            $data = array_merge($dataUsers, $dataRoles, $dataBiodata);
            if ($user_id || $roleUser || $profile) {
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
            $delete = User::destroy($id);
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
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
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
