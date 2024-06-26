<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Check;
use App\Http\Controllers\Controller;
use App\Models\ManagementMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MenuController extends Controller
{
    public $validation = [
        'no_management_menu' => 'required',
        'nama_management_menu' => 'required',
        'icon_management_menu' => 'required',
        'link_management_menu' => 'required',
    ];
    public $customValidation = [
        'required' => ':attribute wajib diisi',
    ];
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
        if ($request->ajax()) {
            $userAcess = session()->get('userAcess');
            $data = ManagementMenu::orderBy('no_management_menu', 'asc')->get();
            $result = [];
            $no = 1;
            if ($data->count() == 0) {
                $result['data'] = [];
            }
            foreach ($data as $index => $v_data) {
                $buttonUpdate = '';
                if ($userAcess['is_update'] == '1') {
                    $buttonUpdate = '
                    <a href="' . route('admin.menu.edit', $v_data->id) . '" class="btn btn-outline-warning m-b-xs btn-edit" style="border-color: #f5af47ea !important;">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    ';
                }
                $buttonDelete = '';
                if ($userAcess['is_delete'] == '1') {
                    $buttonDelete = '
                    <form action=' . route('admin.menu.destroy', $v_data->id) . ' class="d-inline">
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

                $linkSubMenu = $v_data->is_node_management_menu;
                $addLinkSubMenu = null;
                $iconLinkSubMenu = null;
                $pageLinkSubMenu = null;
                if ($linkSubMenu != '1') {
                    $iconLinkSubMenu = '<i class="fas fa-plus"></i>';
                    $addLinkSubMenu = '
                    <span class="text-dark p-3">
                        ' . $iconLinkSubMenu . '
                    </span>
                    ';
                    $pageLinkSubMenu = 'add';
                } else {
                    $iconLinkSubMenu = '<i class="fa-solid fa-pencil"></i>';
                    $addLinkSubMenu = '
                    <span class="text-dark p-3">
                        ' . $iconLinkSubMenu . '
                    </span>
                    ';
                    $pageLinkSubMenu = 'edit';
                }

                $arrSubMenu = $v_data->membawahi_menu_management_menu;
                $arrSubMenu = explode(',', $arrSubMenu);
                $getDataSubMenu = ManagementMenu::whereIn('id', $arrSubMenu)->get();
                $outputSubMenu = '
                <button class="btn btn-info m-b-xs w-100" data-bs-toggle="collapse"
                href="#membawahi_menu_management_menu" role="button"
                aria-expanded="false"
                aria-controls="membawahi_menu_management_menu">
                    ' . $addLinkSubMenu . '
                </button>
                
                
                <div class="collapse" id="membawahi_menu_management_menu">
                    <div class="card card-body p-0 m-0">
                        <a href="' . route('admin.menu.showMenu') . '" data-id="' . $v_data->id . '" data-page="' . $pageLinkSubMenu . '" class="btn btn-outline-primary m-b-xs btn-show-menu" style="border: 1px solid #7888fc !important;" data-bs-toggle="modal" data-bs-target="#modalSubMenu">
                                ' . $iconLinkSubMenu . '
                        </a>
                        <div style="background-color: #5b5b5b; height: 1px;"></div>
                        <div style="height:10px;"></div>
                        <ul>';
                foreach ($getDataSubMenu as $key => $vSubMenu) {
                    $outputSubMenu .= '
                    <li>' . $vSubMenu->icon_management_menu . ' | ' . $vSubMenu->nama_management_menu . '</li>
                   ';
                }
                $outputSubMenu .= '
                        </ul>
                    </div>
                </div>
                ';

                $outputLinkAddMenu = '
                    <div class="text-center">
                        <a href="' . route('admin.menu.showMenu') . '" data-id="' . $v_data->id . '" data-page="' . $pageLinkSubMenu . '" class="btn btn-outline-primary m-b-xs btn-show-menu" style="border: 1px solid #7888fc !important;" data-bs-toggle="modal" data-bs-target="#modalSubMenu">
                        ' . $iconLinkSubMenu . '
                        </a>
                    </div>
                ';

                $result['data'][] = [
                    $v_data->no_management_menu,
                    $v_data->icon_management_menu,
                    $v_data->nama_management_menu,
                    $v_data->link_management_menu,
                    $v_data->membawahi_menu_management_menu != null ? $outputSubMenu : $outputLinkAddMenu,
                    trim($button)
                ];
            }

            return response()->json($result, 200);
        }
        return view('admin.menu.index');
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
        $validator = Validator::make($request->all(), $this->validation, $this->customValidation);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'invalid form validation',
                'result' => $validator->errors()
            ], 400);
        }

        $data = [
            'no_management_menu' => $request->input('no_management_menu'),
            'nama_management_menu' => $request->input('nama_management_menu'),
            'icon_management_menu' => $request->input('icon_management_menu'),
            'link_management_menu' => $request->input('link_management_menu'),
        ];
        $insert = ManagementMenu::create($data);
        if ($insert) {
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

    public function postSubmenu(Request $request, $id)
    {
        //
        // $validator = Validator::make($request->all(), [
        //     'management_menu_id' => ''
        // ], [
        //     'required' => ':attribute wajib diisi',
        // ]);
        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 400,
        //         'message' => 'invalid form validation',
        //         'result' => $validator->errors()
        //     ], 400);
        // }

        $management_menu_id = $request->input('management_menu_id');
        if ($management_menu_id != null && $management_menu_id != '') {
            $membawahi_menu_management_menu = implode(',', $request->input('management_menu_id'));
            $data = [
                'is_node_management_menu' => 1,
                'membawahi_menu_management_menu' => $membawahi_menu_management_menu,
            ];
        } else {
            $data = [
                'is_node_management_menu' => 0,
                'membawahi_menu_management_menu' => null,
            ];
        }

        $update = ManagementMenu::find($id)->update($data);
        if ($update) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menambahkan submenu',
                'result' => [
                    'management_menu_id' => '',
                ],
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal menambahkan submenu',
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
        $roles = ManagementMenu::find($id);
        if ($roles) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil ambil data',
                'result' => $roles,
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
        $validator = Validator::make($request->all(), $this->validation, $this->customValidation);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'invalid form validation',
                'result' => $validator->errors()
            ], 400);
        }

        $data = [
            'no_management_menu' => $request->input('no_management_menu'),
            'nama_management_menu' => $request->input('nama_management_menu'),
            'icon_management_menu' => $request->input('icon_management_menu'),
            'link_management_menu' => $request->input('link_management_menu'),
        ];
        $update = ManagementMenu::find($id)->update($data);
        if ($update) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil update data',
                'result' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal update data',
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
        $delete = ManagementMenu::destroy($id);
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
    public function showMenu()
    {
        $menu = ManagementMenu::all();
        if ($menu) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil ambil data',
                'result' => $menu,
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal ambil data',
            ], 400);
        }
    }
}
