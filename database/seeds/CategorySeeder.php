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
        DB::table('product_categories')->insert ([
            'name'=> 'celulares y tablets',
            'description'=> 'celulares y tablets',

        ]);

        DB::table('product_categories')->insert ([
            'name'=> 'tv, audio y video',
            'description'=> 'tv, audio y video',

        ]);

        DB::table('product_categories')->insert ([
            'name'=> 'computadores',
            'description'=> 'computadores',
        ]);

        DB::table('product_categories')->insert ([
            'name'=> 'videojuegos y consolas',
            'description'=> 'videojuegos y consolas',
        ]);

        DB::table('product_categories')->insert ([
            'name'=> 'electrodomesticos',
            'description'=> 'electrodomesticos',
        ]);

        DB::table('product_categories')->insert ([
            'name'=> 'hogar',
            'description'=> 'hogar',
        ]);

        DB::table('product_categories')->insert ([
            'name'=> 'moda',
            'description'=> 'moda',

        ]);

        DB::table('product_categories')->insert ([
            'name'=> 'libros y musica',
            'description'=> 'libros y musica',

        ]);

        DB::table('product_categories')->insert ([
            'name'=> 'jugueteria',
            'description'=> 'jugueteria',

        ]);

        DB::table('product_categories')->insert ([
            'name'=> 'deportes',
            'description'=> 'deportes',

        ]);
    }
}
