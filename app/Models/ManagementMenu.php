<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementMenu extends Model
{
    use HasFactory;
    protected $table = 'management_menu';
    protected $guarded = ['id'];

    public function managementMenuRoles()
    {
        return $this->hasMany(ManagementMenuRoles::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getData($whereCondition = [], $limit)
    {
        // \DB::connection()->enableQueryLog();
        $getData = ManagementMenu::select('*');
        if (isset($whereCondition['no_management_menu'])) {
            $getData->where('no_management_menu', 'like', '%' . $_GET['no_management_menu'] . '%');
        }
        if (isset($whereCondition['nama_management_menu'])) {
            $getData->where('nama_management_menu', 'like', '%' . $_GET['nama_management_menu'] . '%');
        }
        if (isset($whereCondition['icon_management_menu'])) {
            $getData->where('icon_management_menu', 'like', '%' . $_GET['icon_management_menu'] . '%');
        }
        if (isset($whereCondition['link_management_menu'])) {
            $getData->where('link_management_menu', 'like', '%' . $_GET['link_management_menu'] . '%');
        }
        if (isset($whereCondition['membawahi_menu_management_menu'])) {
            $getData->where('membawahi_menu_management_menu', 'like', '%' . $_GET['membawahi_menu_management_menu'] . '%');
        }
        if (isset($whereCondition['is_node_management_menu'])) {
            $getData->where('is_node_management_menu', 'like', '%' . $_GET['is_node_management_menu'] . '%');
        }
        $getData->orderBy('no_management_menu', 'asc');
        $getData = $getData->paginate($limit);

        // $queries = \DB::getQueryLog();
        $queries = $getData;
        return $queries;
    }
}
