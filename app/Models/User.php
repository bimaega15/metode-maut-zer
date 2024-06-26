<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class, 'users_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getData($whereCondition = [], $limit)
    {
        // \DB::connection()->enableQueryLog();
        $getData = User::with('profile', 'roles', 'roles.managementMenuRoles');
        if (isset($whereCondition['nama_profile'])) {
            $getData->whereHas('profile',  function ($query) {
                return $query->where('nama_profile', 'like', '%' .  $_GET['nama_profile'] . '%');
            });
        }
        if (isset($whereCondition['email_profile'])) {
            $getData->whereHas('profile',  function ($query) {
                return $query->where('email_profile', 'like', '%' .  $_GET['email_profile'] . '%');
            });
        }
        if (isset($whereCondition['alamat_profile'])) {
            $getData->whereHas('profile',  function ($query) {
                return $query->where('alamat_profile', 'like', '%' .  $_GET['alamat_profile'] . '%');
            });
        }
        if (isset($whereCondition['nohp_profile'])) {
            $getData->whereHas('profile',  function ($query) {
                return $query->where('nohp_profile', 'like', '%' .  $_GET['nohp_profile'] . '%');
            });
        }
        if (isset($whereCondition['jenis_kelamin_profile'])) {
            $getData->whereHas('profile',  function ($query) {
                return $query->where('jenis_kelamin_profile', 'like', '%' .  $_GET['jenis_kelamin_profile'] . '%');
            });
        }
        if (isset($whereCondition['id'])) {
            $getData->where('id', 'like', '%' . $_GET['id'] . '%');
        }
        if (isset($whereCondition['username'])) {
            $getData->where('username', 'like', '%' . $_GET['username'] . '%');
        }
        if (isset($whereCondition['nama_roles'])) {
            $getData->whereHas('roles',  function ($query) {
                return $query->where('nama_roles', 'like', '%' .  $_GET['nama_roles'] . '%');
            });
        }
        $getData = $getData->paginate($limit);

        // $queries = \DB::getQueryLog();
        $queries = $getData;
        return $queries;
    }
}
