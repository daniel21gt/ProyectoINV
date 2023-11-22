<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tipos_Usuarios_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


         /* DB::table('tipos_usuarios')->insert([
             
             'usuarios_rol' => 'Administrador', 

         ]);*/


        \App\TiposUsuarios::create([
            'usuarios_rol' => 'Administrador',
        ]);



    }
}
