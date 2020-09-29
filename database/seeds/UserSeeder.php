<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'=> 1,
            'name'=> 'admin',
            'email'=> 'admin@admin.com',
            'password'=> '$2y$10$LOy2p1ZTyvlTKbG.v7N12u0PrXwfIQ7o/7aZDv9A7WGphQ9QiW5O.',
            'status'=>1,
            'email_verified_at'=>'2020-10-08',

        ]);
        DB::table('users')->insert([
            'role_id'=> 2,
            'name'=> 'cliente2',
            'email'=> 'cliente2@cliente.com',
            'password'=> '$2y$10$fL4UJM2V5fxe44HxA5b/7.gCE.4iK3bwFC1xezmEUY7.sO4GTZiN6',
            'status'=>1,
            'email_verified_at'=>'2020-10-08',

        ]);
        DB::table('users')->insert([
            'role_id'=> 2,
            'name'=> 'cliente3',
            'email'=> 'cliente3@cliente.com',
            'password'=> '$2y$10$fL4UJM2V5fxe44HxA5b/7.gCE.4iK3bwFC1xezmEUY7.sO4GTZiN6',
            'status'=>1,
            'email_verified_at'=>'2020-10-08',

        ]);
        DB::table('users')->insert([
            'role_id'=> 2,
            'name'=> 'cliente4',
            'email'=> 'cliente4@cliente.com',
            'password'=> '$2y$10$fL4UJM2V5fxe44HxA5b/7.gCE.4iK3bwFC1xezmEUY7.sO4GTZiN6',
            'status'=>1,
            'email_verified_at'=>'2020-10-08',

        ]);
        DB::table('users')->insert([
            'role_id'=> 2,
            'name'=> 'cliente5',
            'email'=> 'cliente5@cliente.com',
            'password'=> '$2y$10$fL4UJM2V5fxe44HxA5b/7.gCE.4iK3bwFC1xezmEUY7.sO4GTZiN6',
            'status'=>1,
            'email_verified_at'=>'2020-10-08',

        ]);
        DB::table('users')->insert([
            'role_id'=> 2,
            'name'=> 'cliente6',
            'email'=> 'cliente6@cliente.com',
            'password'=> '$2y$10$fL4UJM2V5fxe44HxA5b/7.gCE.4iK3bwFC1xezmEUY7.sO4GTZiN6',
            'status'=>1,
            'email_verified_at'=>'2020-10-08',

        ]);
        DB::table('users')->insert([
            'role_id'=> 2,
            'name'=> 'cliente7',
            'email'=> 'cliente7@cliente.com',
            'password'=> '$2y$10$fL4UJM2V5fxe44HxA5b/7.gCE.4iK3bwFC1xezmEUY7.sO4GTZiN6',
            'status'=>1,
            'email_verified_at'=>'2020-10-08',

        ]);
        DB::table('users')->insert([
            'role_id'=> 2,
            'name'=> 'cliente8',
            'email'=> 'cliente8@cliente.com',
            'password'=> '$2y$10$fL4UJM2V5fxe44HxA5b/7.gCE.4iK3bwFC1xezmEUY7.sO4GTZiN6',
            'status'=>1,
            'email_verified_at'=>'2020-10-08',

        ]);
        DB::table('users')->insert([
            'role_id'=> 2,
            'name'=> 'cliente9',
            'email'=> 'cliten9@cliente.com',
            'password'=> '$2y$10$fL4UJM2V5fxe44HxA5b/7.gCE.4iK3bwFC1xezmEUY7.sO4GTZiN6',
            'status'=>1,
            'email_verified_at'=>'2020-10-08',

        ]);
        DB::table('users')->insert([
            'role_id'=> 2,
            'name'=> 'cliente10',
            'email'=> 'cliente10n@cliente.com',
            'password'=> '$2y$10$fL4UJM2V5fxe44HxA5b/7.gCE.4iK3bwFC1xezmEUY7.sO4GTZiN6',
            'status'=>1,
            'email_verified_at'=>'2020-10-08',

        ]);
    }
}
