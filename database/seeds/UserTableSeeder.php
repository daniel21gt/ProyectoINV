<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $tipo = DB::table('tipos_usuarios')->select('idc')->first();

        $role_admin = Role::where('name', 'admin')->first();
        $user = new User();
        $user->tipos_usuarios_id = $tipo->idc;
		$user->refer = 'alfa';
        $user->name = 'Admin';
        $user->last_name = 'admin';
        $user->username = 'adminad';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('123456');  
        $user->save();
        $user->roles()->attach($role_admin);

 

    }
}
