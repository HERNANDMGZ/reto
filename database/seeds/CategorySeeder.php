<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=> 'celulares y tablets',
            'description'=> 'celulares y tablets',

        ]);

        DB::table('categories')->insert([
            'name'=> 'tv, audio y video',
            'description'=> 'tv, audio y video',

        ]);

        DB::table('categories')->insert([
            'name'=> 'computadores',
            'description'=> 'computadores',
        ]);

        DB::table('categories')->insert([
            'name'=> 'videojuegos y consolas',
            'description'=> 'videojuegos y consolas',
        ]);

        DB::table('categories')->insert([
            'name'=> 'electrodomesticos',
            'description'=> 'electrodomesticos',
        ]);

        DB::table('categories')->insert([
            'name'=> 'hogar',
            'description'=> 'hogar',
        ]);

        DB::table('categories')->insert([
            'name'=> 'moda',
            'description'=> 'moda',

        ]);

        DB::table('categories')->insert([
            'name'=> 'libros y musica',
            'description'=> 'libros y musica',

        ]);

        DB::table('categories')->insert([
            'name'=> 'jugueteria',
            'description'=> 'jugueteria',

        ]);

        DB::table('categories')->insert([
            'name'=> 'deportes',
            'description'=> 'deportes',

        ]);
    }
}
