<?php

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $cost = rand(100,500);
    $profit_margin = rand(40,70);
    $category = \App\Category::inRandomOrder()->first();

    return [
        'name' => $faker->sentence(rand(1,4)),
        'code' => uniqid(),
        'stock' => rand(1,10),
        'cost' => $cost,
        'description' => $faker->text(200),
        'profit_margin' => $profit_margin,
        'category_id' => $category->id,
        'subcategory_id' => $category->subcategories()->inRandomOrder()->first()->id,
        'is_visible' => 1
    ];
});
