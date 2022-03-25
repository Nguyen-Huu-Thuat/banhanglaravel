<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        $adminRoles = Roles::where('name','admin')->first();
        $authorRoles = Roles::where('name','author')->first();
        $userRoles = Roles::where('name','user')->first();

        $admin = Admin::create([
            'admin_name' => 'thuatadmin',
            'admin_email' => 'thuatadmin@gmail.com',
            'admin_password' => md5('123456'),
            'admin_phone' => '0358559461'
        ]);
        $author = Admin::create([
            'admin_name' => 'thuatauthor',
            'admin_email' => 'thuatauthor@gmail.com',
            'admin_password' => md5('123456'),
            'admin_phone' => '0358559461'
        ]);
        $user = Admin::create([
            'admin_name' => 'thuatuser',
            'admin_email' => 'thuatuser@gmail.com',
            'admin_password' => md5('123456'),
            'admin_phone' => '0358559461'
        ]);
        $admin->Roles()->attach($adminRoles);
        $author->Roles()->attach($authorRoles);
        $user->Roles()->attach($userRoles);
    }
}
