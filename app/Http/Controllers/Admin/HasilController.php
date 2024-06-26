<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Check;
use App\Helper\Metode;
use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\HasilDetail;
use App\Models\Kriteria;
use App\Models\SelesaiTest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilController extends Controller
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

                $data = SelesaiTest::all();
                $result = [];
                $no = 1;
                if ($data->count() == 0) {
                    $result['data'] = [];
                }

                foreach ($data as $index => $v_data) {
                    $buttonDetail = '';

                    $buttonDetail = '
               <a href="' . route('admin.hasil.detail', $v_data->id) . '" class="btn btn-outline-info m-b-xs btn-edit" style="border-color: #7888fc !important;">
                   <i class="fa-solid fa-eye"></i>
               </a>
               ';

                    $buttonDelete = '';
                    if ($userAcess['is_delete'] == '1') {
                        $buttonDelete = '
               <form action=' . route('admin.hasil.destroy', $v_data->id) . ' class="d-inline">
               <button type="submit" class="btn-delete btn btn-outline-danger m-b-xs" style="border-color: #f75d6fd8 !important;">
                   <i class="fa-solid fa-trash-can"></i>
               </button>
           </form>
               ';
                    }
                    $button = '
       <div class="text-center">
       ' . $buttonDetail . '               
       ' . $buttonDelete . '               
       </div>
       ';

                    $result['data'][] = [
                        $no++,
                        Check::convertDate($v_data->tanggal_selesai_test),
                        $v_data->judul_selesai_test,
                        $v_data->keterangan_selesai_test,
                        trim($button)
                    ];
                }

                return response()->json($result, 200);
            }

            return view('admin.hasil.index');
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 400);
        }
    }

    public function detail(Request $request, $id)
    {
        try {
            //code...
            $getDetail = Metode::getPerhitunganMetodeHasil($id);
            if ($getDetail) {
                $saveMetode = Metode::getPerhitunganMetode($request);
                return view('admin.hasil.detail', $saveMetode['metode']);
            } else {
                session()->flash('error', 'Gagal ambil data');
                return redirect(url(`/admin/hasil/` + $id + `/detail`));
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 400);
        }
    }
    public function destroy($id)
    {
        //
        try {
            //code...
            DB::beginTransaction();
            $delete = SelesaiTest::destroy($id);
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
