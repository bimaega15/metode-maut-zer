<?php

namespace App\Http\Controllers\Api;

use App\Helper\Check;
use App\Http\Controllers\Controller;
use App\Models\Konfigurasi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;

class KonfigurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $getData = Konfigurasi::first();
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
        //
        $validator = Validator::make($request->all(), [
            'nama_konfigurasi' => 'required',
            'nohp_konfigurasi' => 'required',
            'alamat_konfigurasi' => 'required',
            'email_konfigurasi' => 'required|email',
            'created_konfigurasi' => 'required',
            'logo_konfigurasi' => 'image|max:2048',
        ], [
            'required' => ':attribute wajib diisi',
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

        $page = $request->input('page');
        if ($page == 'add') {
            // biodata
            $file = $request->file('logo_konfigurasi');
            $logo_konfigurasi = $this->uploadFile($file);
            $dataBiodata = [
                'nama_konfigurasi' => $request->input('nama_konfigurasi'),
                'nohp_konfigurasi' => $request->input('nohp_konfigurasi'),
                'alamat_konfigurasi' => $request->input('alamat_konfigurasi'),
                'email_konfigurasi' => $request->input('email_konfigurasi'),
                'deskripsi_konfigurasi' => $request->input('deskripsi_konfigurasi'),
                'created_konfigurasi' => $request->input('created_konfigurasi'),
                'logo_konfigurasi' => $logo_konfigurasi
            ];
            $insert = Konfigurasi::create($dataBiodata);
            if ($insert) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil insert data',
                    'result' => $request->all()
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal insert data',
                ], 400);
            }
        } else {
            // biodata
            $id = $request->input('id');
            $file = $request->file('logo_konfigurasi');
            $logo_konfigurasi = $this->uploadFile($file, $id);
            $dataBiodata = [
                'nama_konfigurasi' => $request->input('nama_konfigurasi'),
                'nohp_konfigurasi' => $request->input('nohp_konfigurasi'),
                'alamat_konfigurasi' => $request->input('alamat_konfigurasi'),
                'email_konfigurasi' => $request->input('email_konfigurasi'),
                'deskripsi_konfigurasi' => $request->input('deskripsi_konfigurasi'),
                'created_konfigurasi' => $request->input('created_konfigurasi'),
                'logo_konfigurasi' => $logo_konfigurasi,
            ];
            $update = Konfigurasi::find($id)->update($dataBiodata);
            if ($update) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil update data',
                    'result' => $request->all()
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal update data',
                ], 400);
            }
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
    }

    private function uploadFile($file, $id = null)
    {
        if ($file != null) {
            // delete file
            $this->deleteFile($id);
            // nama file
            $fileExp =  explode('.', $file->getClientOriginalName());
            $name = $fileExp[0];
            $ext = $fileExp[1];
            $name = time() . '-' . str_replace(' ', '-', $name) . '.' . $ext;

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'upload/konfigurasi/';

            // upload file
            $file->move($tujuan_upload, $name);
        } else {
            if ($id == null) {
                $name = 'default.png';
            } else {
                $user = Konfigurasi::where('id', $id)->first();
                $name = $user->logo_konfigurasi;
            }
        }

        return $name;
    }

    private function deleteFile($id = null)
    {
        if ($id != null) {
            $konfigurasi = Konfigurasi::where('id', '=', $id)->first();
            $gambar = public_path() . '/upload/konfigurasi/' . $konfigurasi->logo_konfigurasi;
            if (file_exists($gambar)) {
                if ($konfigurasi->logo_konfigurasi != 'default.png') {
                    File::delete($gambar);
                }
            }
        }
    }
}
