<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'roles';

    public function managementMenuRoles()
    {
        return $this->hasMany(ManagementMenuRoles::class, 'roles_id', 'id');
    }

    public function managementMenu()
    {
        return $this->belongsToMany(ManagementMenu::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getData($whereCondition = [], $limit)
    {
        // \DB::connection()->enableQueryLog();
        $getData = Role::select('*');
        if (isset($whereCondition['nama_roles'])) {
            $getData->where('nama_roles', 'like', '%' .  $_GET['nama_roles'] . '%');
        }
        $getData = $getData->paginate($limit);

        // $queries = \DB::getQueryLog();
        $queries = $getData;
        return $queries;
    }
}
