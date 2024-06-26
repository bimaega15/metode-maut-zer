<?php

namespace App\Http\Controllers\Api;

use App\Helper\Check;
use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\ManagementMenu;
use App\Models\Role;
use App\Models\ManagementMenuRoles;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\Console;

class AccessController extends Controller
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
            $data = new ManagementMenuRoles();
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
        //
        try {
            //code...
            $validator = Validator::make($request->all(), [
                'management_menu_id' => 'required',
                'roles_id' => ['required', function ($attribute, $value, $fail) {
                    $roles_id = $_POST['roles_id'];
                    $checkMenuRoles = ManagementMenuRoles::where('roles_id', $roles_id)->count();
                    if ($checkMenuRoles > 0) {
                        $fail('Role access user sudah ada');
                    }
                }]
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
            $data = [];
            $management_menu_id = $request->input('management_menu_id');
            $management_menu_id = explode(',', $management_menu_id);
            foreach ($management_menu_id as $key => $item) {
                $data[] = [
                    'management_menu_id' => $item,
                    'roles_id' => $request->input('roles_id')
                ];
            }
            $insert = ManagementMenuRoles::insert($data);
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
        try {
            //code...
            $roles = ManagementMenuRoles::with('role')->where('roles_id', $id)
                ->groupBy('roles_id')
                ->first();
            $managementMenu = ManagementMenuRoles::with('role')->where('roles_id', $id)
                ->get();


            if ($roles) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil ambil data',
                    'result' => [
                        'roles' => $roles,
                        'managementMenu' => $managementMenu
                    ],
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
                'management_menu_id' => 'required',
                'roles_id' => ['required', function ($attribute, $value, $fail) {
                    $roles_id = $_POST['roles_id'];
                    $id = $_POST['id'];

                    $checkMenuRoles = ManagementMenuRoles::where('roles_id', $roles_id)
                        ->where('roles_id', '!=', $id)
                        ->count();
                    if ($checkMenuRoles > 0) {
                        $fail('Role access user sudah ada');
                    }
                }]
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
            $roles_id = $id;
            $checkDb = ManagementMenuRoles::where('roles_id', $roles_id);
            $dataMenuRoles = $checkDb->get();
            if ($checkDb->count() > 0) {
                $checkDb->delete();
            }

            $data = [];
            $management_menu_id = $request->input('management_menu_id');
            $management_menu_id = explode(',', $management_menu_id);

            foreach ($management_menu_id as $key => $item) {
                $isCreate = null;
                $isUpdate = null;
                $isDelete = null;

                if (isset($dataMenuRoles[$key]->is_create)) {
                    $isCreate = $dataMenuRoles[$key]->is_create;
                }

                if (isset($dataMenuRoles[$key]->is_update)) {
                    $isUpdate = $dataMenuRoles[$key]->is_update;
                }

                if (isset($dataMenuRoles[$key]->is_delete)) {
                    $isDelete = $dataMenuRoles[$key]->is_delete;
                }
                $data[] = [
                    'management_menu_id' => $item,
                    'roles_id' => $request->input('roles_id'),
                    'is_create' => $isCreate,
                    'is_update' => $isUpdate,
                    'is_delete' => $isDelete,
                ];
            }

            $insert = ManagementMenuRoles::insert($data);
            DB::commit();

            if ($insert) {
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
            $delete = ManagementMenuRoles::where('roles_id', $id)->delete();
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


    public function updateAccess($id)
    {
        try {
            //code...
            DB::beginTransaction();
            $valueCheck = request()->input('valueChecked');
            $status = request()->input('status');

            $data = [];
            switch ($status) {
                case 'create':
                    $data = [
                        'is_create' => $valueCheck != null && $valueCheck != '' ? 1 : null
                    ];
                    break;
                case 'update':
                    $data = [
                        'is_update' => $valueCheck != null && $valueCheck != '' ? 1 : null
                    ];
                    break;
                case 'delete':
                    $data = [
                        'is_delete' => $valueCheck != null && $valueCheck != '' ? 1 : null
                    ];
                    break;

                default:
                    $data = [
                        'is_create' => $valueCheck != null && $valueCheck != '' ? 1 : null
                    ];
                    break;
            }

            $update = ManagementMenuRoles::where('id', $id)->update($data);
            DB::commit();
            if ($update) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil tambah access data',
                    'result' => request()->all()
                ], 200);
            } else {
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil tambah access data',
                ], 200);
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
