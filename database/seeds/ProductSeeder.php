<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id'=> 1,
            'name'=> 'productX',
            'slug'=> 'productX',
            'description'=>' article description article description article description',
            'pricing' => 99999,
            'status'=> 1,
            'image'=> '2020_10_04_05_08_56288.jpg',

        ]);
        DB::table('products')->insert([
            'category_id'=> 2,
            'name'=> 'productX2',
            'slug'=> 'productX2',
            'description'=>' article description article description article description',
            'pricing' => 99999,
            'status'=> 1,
            'image'=> '2020_10_04_05_29_52919.jpg',

        ]);
        DB::table('products')->insert([
            'category_id'=> 3,
            'name'=> 'productX3',
            'slug'=> 'productX3',
            'description'=>' article description article description article description',
            'pricing' => 99999,
            'status'=> 1,
            'image'=> '2020_10_04_05_29_30880.jpg',

        ]);
        DB::table('products')->insert([
            'category_id'=> 4,
            'name'=> 'productX4',
            'slug'=> 'productX4',
            'description'=>' article description article description article description',
            'pricing' => 99999,
            'status'=> 1,
            'image'=> '2020_10_04_05_28_43937.jpg',

        ]);
        DB::table('products')->insert([
            'category_id'=> 5,
            'name'=> 'productX5',
            'slug'=> 'productX5',
            'description'=>' article description article description article description',
            'pricing' => 99999,
            'status'=> 1,
            'image'=> '2020_10_04_05_26_46879.jpg',

        ]);
        DB::table('products')->insert([
            'category_id'=> 6,
            'name'=> 'productX6',
            'slug'=> 'productX6',
            'description'=>' article description article description article description',
            'pricing' => 99999,
            'status'=> 1,
            'image'=> '2020_10_04_05_28_13290.jpg',

        ]);
        DB::table('products')->insert([
            'category_id'=> 7,
            'name'=> 'productX7',
            'slug'=> 'productX7',
            'description'=>' article description article description article description',
            'pricing' => 99999,
            'status'=> 1,
            'image'=> '2020_10_04_05_25_33546.jpg',

        ]);
        DB::table('products')->insert([
            'category_id'=> 8,
            'name'=> 'productX8',
            'slug'=> 'productX8',
            'description'=>' article description article description article description',
            'pricing' => 99999,
            'status'=> 1,
            'image'=> '2020_10_04_05_27_07594.jpg',

        ]);
        DB::table('products')->insert([
            'category_id'=> 9,
            'name'=> 'productX9',
            'slug'=> 'productX9',
            'description'=>' article description article description article description',
            'pricing' => 99999,
            'status'=> 1,
            'image'=> '2020_10_04_05_41_04562.jpg',

        ]);
        DB::table('products')->insert([
            'category_id'=> 10,
            'name'=> 'productX10',
            'slug'=> 'productX10',
            'description'=>' article description article description article description',
            'pricing' => 99999,
            'status'=> 1,
            'image'=> '2020_10_04_05_26_18270.jpg',

        ]);

    }
}
