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
    }
}