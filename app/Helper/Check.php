<?php

namespace App\Helper;

use App\Models\Alternatif;
use App\Models\Konfigurasi;
use App\Models\Kriteria;
use App\Models\ManagementMenu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Check
{
    public static function getKonfigurasi()
    {
        $konfigurasi = Konfigurasi::first();
        return $konfigurasi;
    }
    public static function getMenu($currentUrl = null)
    {
        $getUserProfile = Check::getUserProfile();
        $menu = ManagementMenu::leftJoin('management_menu_roles', 'management_menu.id', '=', 'management_menu_roles.management_menu_id')
            ->where('management_menu_roles.roles_id', $getUserProfile->roles[0]->id);
        if ($currentUrl != null) {
            $menu->where('management_menu.link_management_menu', $currentUrl);
        }
        $menu->orderBy('management_menu.no_management_menu', 'asc')
            ->select('management_menu.*', 'management_menu_roles.is_create', 'management_menu_roles.is_update', 'management_menu_roles.is_delete');
        $menu = $menu->get();
        return $menu;
    }
    public static function getMenuInId($arr_id = [])
    {
        $menu =  ManagementMenu::whereIn('id', $arr_id)->get();
        return $menu;
    }
    public static function getUserProfile()
    {
        $myProfile = User::with('profile', 'roles')->where('users.id', Auth::id())->first();
        return $myProfile;
    }
    public static function getCurrentUrl()
    {
        $urlCurrent = url()->current();
        $explodeCurrent = explode('/', $urlCurrent);
        unset($explodeCurrent[0]);
        unset($explodeCurrent[1]);
        unset($explodeCurrent[2]);
        // unset($explodeCurrent[3]);
        $currentUrl = '/' . implode('/', $explodeCurrent);
        return $currentUrl;
    }

    public static function getKriteria($id)
    {
        $getKriteria = Kriteria::find($id);
        return $getKriteria;
    }

    public static function getAlternatif($id)
    {
        $getAlternatif = Alternatif::find($id);
        return $getAlternatif;
    }

    public static function convertDate($tanggal)
    {
        $arrTanggal = [];
        $explodeTanggal = explode('-', $tanggal);
        $arrTanggal[0] = $explodeTanggal[2];
        $arrTanggal[1] = $explodeTanggal[1];
        $arrTanggal[2] = $explodeTanggal[0];

        $getTanggal = implode('-', $arrTanggal);
        return $getTanggal;
    }
}
