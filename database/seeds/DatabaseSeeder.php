<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

    // La creación de datos de roles debe ejecutarse primero
       $this->call(RoleTableSeeder::class);


    // Creacion tipos usuarios
       $this->truncateTables([

            'tipos_usuarios',

       ]);

       $this->call(Tipos_Usuarios_Seeder::class);

   

    // Los usuarios necesitarán los roles previamente generados
       $this->call(UserTableSeeder::class);



    }



   
     protected function truncateTables(array $tables)
       {

            DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

                foreach ($tables as $table) {
                     DB::table($table)->truncate();
                }

            DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        }




}
