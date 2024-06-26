<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'username' => 'admin123',
            'password' => Hash::make('admin123'),
        ]);
        $role = Role::create([
            'nama_roles' => 'admin'
        ]);

        $profile = Profile::create([
            'users_id' => $user->id,
            'nama_profile' => 'Admin maut',
            'email_profile' => 'adminmaut@gmail.com',
            'alamat_profile' => 'alamat admin',
            'nohp_profile' => '082277506232',
            'jenis_kelamin_profile' => 'L',
            'gambar_profile' => 'default.png'
        ]);

        $roleUser = RoleUser::create([
            'role_id' => $role->id,
            'user_id' => $user->id,
        ]);

        // owner
        $user = User::create([
            'username' => 'owner123',
            'password' => Hash::make('owner123'),
        ]);
        $role = Role::create([
            'nama_roles' => 'owner'
        ]);

        $profile = Profile::create([
            'users_id' => $user->id,
            'nama_profile' => 'owner maut',
            'email_profile' => 'ownermaut@gmail.com',
            'alamat_profile' => 'alamat owner',
            'nohp_profile' => '082277506232',
            'jenis_kelamin_profile' => 'L',
            'gambar_profile' => 'default.png'
        ]);

        $roleUser = RoleUser::create([
            'role_id' => $role->id,
            'user_id' => $user->id,
        ]);


        // developer
        $user = User::create([
            'username' => 'developer123',
            'password' => Hash::make('developer123'),
        ]);
        $role = Role::create([
            'nama_roles' => 'developer'
        ]);

        $profile = Profile::create([
            'users_id' => $user->id,
            'nama_profile' => 'developer maut',
            'email_profile' => 'developermaut@gmail.com',
            'alamat_profile' => 'alamat developer',
            'nohp_profile' => '082277506232',
            'jenis_kelamin_profile' => 'L',
            'gambar_profile' => 'default.png'
        ]);

        $roleUser = RoleUser::create([
            'role_id' => $role->id,
            'user_id' => $user->id,
        ]);

        // user
        $user = User::create([
            'username' => 'user123',
            'password' => Hash::make('user123'),
        ]);
        $role = Role::create([
            'nama_roles' => 'user'
        ]);

        $profile = Profile::create([
            'users_id' => $user->id,
            'nama_profile' => 'user maut',
            'email_profile' => 'usermaut@gmail.com',
            'alamat_profile' => 'alamat user',
            'nohp_profile' => '082277506232',
            'jenis_kelamin_profile' => 'L',
            'gambar_profile' => 'default.png'
        ]);

        $roleUser = RoleUser::create([
            'role_id' => $role->id,
            'user_id' => $user->id,
        ]);
    }
}
