<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'currency_id' => 1,
        'shipping_fullname' => $faker->name,
        'shipping_address' => $faker->address,
        'grand_total' => $faker->randomFloat(),
        'item_count' => $faker->numberBetween(1, 23),
        'email' => $faker->email,
        'shipping_phone' => $faker->phoneNumber
    ];
});
