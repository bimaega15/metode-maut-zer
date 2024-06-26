<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Check;
use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\KriteriaSubkriteria;
use App\Models\ManagementMenu;
use App\Models\Nilai;
use App\Models\Role;
use App\Models\SubKriteria;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $getCurrentUrl = Check::getCurrentUrl();
        if (!isset(Check::getMenu($getCurrentUrl)[0])) {
            abort(403, 'Cannot access page');
        }
        $getMenu = Check::getMenu($getCurrentUrl)[0];

        session()->put('userAcess.is_create', $getMenu->is_create);
        session()->put('userAcess.is_update', $getMenu->is_update);
        session()->put('userAcess.is_delete', $getMenu->is_delete);

        $data['alternatif'] = Alternatif::all()->count();
        $data['hasil'] = Hasil::all()->count();
        $data['kriteria'] = Kriteria::all()->count();
        $data['penilaian'] = KriteriaSubkriteria::all()->count();
        $data['menu'] = ManagementMenu::all()->count();
        $data['nilai'] = Nilai::all()->count();
        $data['roles'] = Role::all()->count();
        $data['subKriteria'] = SubKriteria::all()->count();
        $data['users'] = User::all()->count();

        return view('admin.dashboard.index', $data);
    }
}
