<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Check;
use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\ManagementMenu;
use App\Models\Role;
use App\Models\ManagementMenuRoles;
use App\Models\User;
use Illuminate\Http\Request;
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

        $getCurrentUrl = Check::getCurrentUrl();
        if (!isset(Check::getMenu($getCurrentUrl)[0])) {
            abort(403, 'Cannot access page');
        }
        $getMenu = Check::getMenu($getCurrentUrl)[0];

        session()->put('userAcess.is_create', $getMenu->is_create);
        session()->put('userAcess.is_update', $getMenu->is_update);
        session()->put('userAcess.is_delete', $getMenu->is_delete);


        //
        // session()->forget('saveMenu');
        $data = ManagementMenuRoles::with('role', 'managementMenu')
            ->orderBy('id', 'asc')
            ->groupBy('roles_id')
            ->get();


        if ($request->ajax()) {
            $userAcess = session()->get('userAcess');
            $data = ManagementMenuRoles::with('role', 'managementMenu')
                ->orderBy('id', 'asc')
                ->groupBy('roles_id')
                ->get();

            $result = [];
            $no = 1;
            if ($data->count() == 0) {
                $result['data'] = [];
            }
            foreach ($data as $index => $v_data) {
                $buttonUpdate = '';
                if ($userAcess['is_update'] == '1') {
                    $buttonUpdate = '
                    <a href="' . route('admin.access.edit', $v_data->roles_id) . '" class="btn btn-outline-warning m-b-xs btn-edit" style="border-color: #f5af47ea !important;">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    ';
                }
                $buttonDelete = '';
                if ($userAcess['is_delete'] == '1') {
                    $buttonDelete = '
                    <form action=' . route('admin.access.destroy', $v_data->roles_id) . ' class="d-inline">
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
                    $v_data->role->nama_roles,
                    '
                    <div class="text-center">
                        <button data-roles_id="' . $v_data->roles_id . '" type="button" class="btn btn-primary m-b-xs btn-menu-access" data-bs-toggle="modal" data-bs-target="#modalAccessMenu">
                        <i class="fa-solid fa-list"></i> Menu access</button>
                    </div>
                    ',
                    trim($button)
                ];
            }

            return response()->json($result, 200);
        }

        $session = $request->session()->get('saveGejalaId');

        return view('admin.access.index', [
            'role' => Role::orderBy('nama_roles', 'asc')->get(),
            'managementMenu' => ManagementMenu::orderBy('no_management_menu', 'asc')->get(),
        ]);
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
                'result' => $validator->errors()
            ], 400);
        }

        $data = [];
        $management_menu_id = $request->input('management_menu_id');
        foreach ($management_menu_id as $key => $item) {
            $data[] = [
                'management_menu_id' => $item,
                'roles_id' => $request->input('roles_id')
            ];
        }

        $insert = ManagementMenuRoles::insert($data);
        if ($insert) {
            $request->session()->forget('saveGejalaId');
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil insert data',
                'result' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal insert data',
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
        $roles = ManagementMenuRoles::where('roles_id', $id)
            ->groupBy('roles_id')
            ->first();
        $managementMenu = ManagementMenuRoles::where('roles_id', $id)
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
                'result' => $validator->errors()
            ], 400);
        }

        $roles_id = $id;
        $checkDb = ManagementMenuRoles::where('roles_id', $roles_id);
        $dataMenuRoles = $checkDb->get();
        if ($checkDb->count() > 0) {
            $checkDb->delete();
        }

        $data = [];
        $management_menu_id = $request->input('management_menu_id');
        foreach ($management_menu_id as $key => $item) {
            $isCreate = null;
            $isUpdate = null;
            $isDelete = null;

            if (isset($dataMenuRoles[$key]->is_create)) {
                $isCreate = 1;
            }

            if (isset($dataMenuRoles[$key]->is_update)) {
                $isUpdate = 1;
            }

            if (isset($dataMenuRoles[$key]->is_delete)) {
                $isDelete = 1;
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
        if ($insert) {
            $request->session()->forget('saveGejalaId');
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil insert data',
                'result' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal insert data',
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
        $delete = ManagementMenuRoles::where('roles_id', $id)->delete();
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
    }


    // management menu
    public function managementMenu()
    {
        $managementMenu = ManagementMenu::all();
        if ($managementMenu) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil ambil data',
                'result' => $managementMenu
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal ambil data',
            ], 400);
        }
    }

    public function managementMenuById()
    {
        $roles_id = request()->input('roles_id');
        $managementMenu = ManagementMenuRoles::with('role', 'managementMenu')->where('roles_id', $roles_id)->get();
        if ($managementMenu) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil ambil data',
                'result' => $managementMenu
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal ambil data',
            ], 400);
        }
    }

    public function updateAccess()
    {
        $status = request()->input('status');
        $value = request()->input('value');
        $valueCheck = request()->input('valueChecked');

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

        $update = ManagementMenuRoles::where('id', $value)->update($data);
        if ($update) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil tambah access data',
            ], 200);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil tambah access data',
            ], 200);
        }
    }
}
