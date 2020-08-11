<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert ([
            'name'=> 'administrador',
            'description'=> 'administrador',

        ]);

        DB::table('roles')->insert ([
            'name'=> 'cliente',
            'description'=> 'usuario comun',

        ]);

        DB::table('roles')->insert ([
            'name'=> 'vendedor',
            'description'=> 'moderador con ciertos privilegios',

        ]);

    }
}
