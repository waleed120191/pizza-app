<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class)->create(['name' => 'Chicken stripes', 'description' => 'Barbecue sauce, gouda cheese, chicken nuggets, corn, bell pepper', 'cover_img' => 'chicken_stripes.jpg']);
        factory(Product::class)->create(['name' => 'Classico', 'description' => 'Tomato sauce, gouda cheese, salami, mushrooms, pepperoni pepper', 'cover_img' => 'classico.jpg']);
        factory(Product::class)->create(['name' => 'Frutti di Mare', 'description' => 'Tomato sauce, gouda cheese, mix seafood, red onion, tomato', 'cover_img' => 'frutti_de_mare.jpg']);
        factory(Product::class)->create(['name' => 'Mexicana', 'description' => 'Tomato sauce, gouda сheese, chicken fillet, red onion, spinach, jalapeno pepper, pepperoni', 'cover_img' => 'mexicana.jpg']);
        factory(Product::class)->create(['name' => 'Quattro Formaggi', 'description' => 'Tomato sauce, gouda cheese, mozzarella cheese, cheddar cheese, parmesan cheese', 'cover_img' => 'quatto.jpg']);
        factory(Product::class)->create(['name' => 'Salami', 'description' => 'Tomato sauce, gouda cheese, salami', 'cover_img' => 'salami.jpg']);
        factory(Product::class)->create(['name' => 'Vegeterian', 'description' => 'Tomato sauce, gouda cheese, spinach, red onion, bell pepper, tomatoes, mushrooms', 'cover_img' => 'vegeterian.jpg']);
        factory(Product::class)->create(['name' => 'Volcano', 'description' => 'Tomato sauce, gouda cheese, spinach, red onion, bell pepper, tomatoes, mushrooms, chicken fillet, olives', 'cover_img' => 'volcano.jpg']);
    }
}
