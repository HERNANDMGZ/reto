<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductOrder;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(ProductOrder::class, function (Faker $faker) {
    return [
        'product_id' => 1,
        'order_id' => 1,
        'product_pricing' => 99999,
        'quantity' => 1,
    ];
});
