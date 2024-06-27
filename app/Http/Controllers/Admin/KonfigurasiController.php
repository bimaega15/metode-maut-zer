<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Check;
use App\Http\Controllers\Controller;
use App\Models\Konfigurasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Support\Facades\Storage;

class KonfigurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $getCurrentUrl = Check::getCurrentUrl();
        if (!isset(Check::getMenu($getCurrentUrl)[0])) {
            abort(403, 'Cannot access page');
        }
        $getMenu = Check::getMenu($getCurrentUrl)[0];

        session()->put('userAcess.is_create', $getMenu->is_create);
        session()->put('userAcess.is_update', $getMenu->is_update);
        session()->put('userAcess.is_delete', $getMenu->is_delete);

        //
        $data = Konfigurasi::first();
        if ($request->ajax()) {
            $data = Konfigurasi::first();
            if ($data) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil ambil data',
                    'result' => $data,
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Gagal ambil data',
                ], 400);
            }
        }
        return view('admin.konfigurasi.index');
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
            $logo_konfigurasi = $this->uploadFile($request);
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
                    'result' => $dataBiodata
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
            $logo_konfigurasi = $this->uploadFile($request, $id);
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
                    'result' => $dataBiodata
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

    private function uploadFile($request, $id = null)
    {
        if ($request->logo_konfigurasi && $request->logo_konfigurasi->isValid()) {
            // delete file
            $this->deleteFile($id);

            $file = $request->logo_konfigurasi->store('public/upload/konfigurasi');
            $path_logo_konfigurasi = explode('/', $file);
            $index_logo_konfigurasi = count($path_logo_konfigurasi) - 1;
            $logo_konfigurasi = $path_logo_konfigurasi[$index_logo_konfigurasi];

            $name = $logo_konfigurasi;
        } else {
            if ($id == null) {
                $name = 'default.png';
            } else {
                $konfigurasi = Konfigurasi::find($id);
                $name = $konfigurasi->logo_konfigurasi;
            }
        }

        return $name;
    }


    private function deleteFile($id = null)
    {
        if ($id != null) {
            $konfigurasi = Konfigurasi::find($id);
            $filePath = 'upload/konfigurasi/' . $konfigurasi->logo_konfigurasi;

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
        }
    }
}
