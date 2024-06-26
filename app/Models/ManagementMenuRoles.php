<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementMenuRoles extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'management_menu_roles';

    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id', 'id');
    }
    public function managementMenu()
    {
        return $this->belongsTo(ManagementMenu::class);
    }

    public function getData($whereCondition = [], $limit)
    {
        // \DB::connection()->enableQueryLog();
        $getData = ManagementMenuRoles::with('role', 'managementMenu');
        if (isset($whereCondition['nama_roles'])) {
            $getData->whereHas('role',  function ($query) {
                return $query->where('nama_roles', 'like', '%' .  $_GET['nama_roles'] . '%');
            });
        }
        if (isset($whereCondition['no_management_menu'])) {
            $getData->whereHas('managementMenu',  function ($query) {
                return $query->where('no_management_menu', 'like', '%' .  $_GET['no_management_menu'] . '%');
            });
        }
        if (isset($whereCondition['nama_management_menu'])) {
            $getData->whereHas('managementMenu',  function ($query) {
                return $query->where('nama_management_menu', 'like', '%' .  $_GET['nama_management_menu'] . '%');
            });
        }
        if (isset($whereCondition['icon_management_menu'])) {
            $getData->whereHas('managementMenu',  function ($query) {
                return $query->where('icon_management_menu', 'like', '%' .  $_GET['icon_management_menu'] . '%');
            });
        }
        if (isset($whereCondition['link_management_menu'])) {
            $getData->whereHas('managementMenu',  function ($query) {
                return $query->where('link_management_menu', 'like', '%' .  $_GET['link_management_menu'] . '%');
            });
        }
        if (isset($whereCondition['membawahi_menu_management_menu'])) {
            $getData->whereHas('managementMenu',  function ($query) {
                return $query->where('membawahi_menu_management_menu', 'like', '%' .  $_GET['membawahi_menu_management_menu'] . '%');
            });
        }
        if (isset($whereCondition['is_node_management_menu'])) {
            $getData->whereHas('managementMenu',  function ($query) {
                return $query->where('is_node_management_menu', 'like', '%' .  $_GET['is_node_management_menu'] . '%');
            });
        }

        $getData = $getData->paginate($limit);
        // $queries = \DB::getQueryLog();
        $queries = $getData;
        return $queries;
    }
}
