<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Item;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::factory()->create([
            'title' => 'pizza'
        ]);

        Category::factory()->create([
            'title' => 'drink'
        ]);

        Ingredient::factory()->create([
            'title' => 'Tomatoes',
            'description' => 'Fresh tomatoes, the best i\'ve ever seen',
            'image' => 'tomatoes.jpg',
            'price' => '20',
            'weight' => '100',
        ]);

        Ingredient::factory()->create([
            'title' => 'Cucumbers',
            'description' => 'Green, delicious and crisp, best choose',
            'image' => 'cucumbers.png',
            'price' => '15',
            'weight' => '60',
        ]);

        Ingredient::factory()->create([
            'title' => 'Meat',
            'description' => ' 	Just a chicken meat, do eat.',
            'image' => 'meat.jpg',
            'price' => '60',
            'weight' => '120',
        ]);

        Ingredient::factory()->create([
            'title' => 'Cheese',
            'description' => 'Cheese from Netherlands, and stop grinning',
            'image' => 'cheese.jpg',
            'price' => '40',
            'weight' => '70',
        ]);

        $pizza = Item::factory()->create([
            'title' => 'Cheddar',
            'description' => 'Delicious pizza from Italy, i guess',
            'image' => 'cheddar.jpg',
            'price' => '599.99',
            'category_id' => 1
        ]);

        $pizza->ingredients()->attach(1);
        $pizza->ingredients()->attach(2);
        $pizza->ingredients()->attach(3);
        $pizza->ingredients()->attach(4);

        $pizza = Item::factory()->create([
            'title' => 'Chicken pizza',
            'description' => 'Delicious pizza with chicken meat',
            'image' => 'chicken_pizza.jpg',
            'price' => '499.99',
            'category_id' => 1
        ]);

        $pizza->ingredients()->attach(1);
        $pizza->ingredients()->attach(2);
        $pizza->ingredients()->attach(3);
        $pizza->ingredients()->attach(4);

        $pizza = Item::factory()->create([
            'title' => 'Mushroom pizza',
            'description' => 'Delicious pizza with mushrooms',
            'image' => 'mushroom_pizza.jpg',
            'price' => '459.99',
            'category_id' => 1
        ]);

        $pizza->ingredients()->attach(1);
        $pizza->ingredients()->attach(2);
        $pizza->ingredients()->attach(3);
        $pizza->ingredients()->attach(4);

        $pizza = Item::factory()->create([
            'title' => 'Pepperoni',
            'description' => 'Pepperoni, too hot',
            'image' => 'pepperoni_pizza.jpg',
            'price' => '399.99',
            'category_id' => 1
        ]);

        $pizza->ingredients()->attach(1);
        $pizza->ingredients()->attach(2);
        $pizza->ingredients()->attach(3);
        $pizza->ingredients()->attach(4);

        Item::factory()->create([
            'title' => 'Coca cola',
            'description' => 'Classic coca cola 2l',
            'image' => 'cola.jpg',
            'price' => '99.99',
            'category_id' => 2
        ]);

        Item::factory()->create([
            'title' => 'Fanta',
            'description' => 'Classic Fanta 2l',
            'image' => 'fanta.jpeg',
            'price' => '99.99',
            'category_id' => 2
        ]);

        Item::factory()->create([
            'title' => 'Sprite',
            'description' => 'Classic sprite 2l',
            'image' => 'sprite.jpeg',
            'price' => '99.99',
            'category_id' => 2
        ]);

        Item::factory()->create([
            'title' => 'Mountain Dew',
            'description' => 'Classic mountain dew 2l',
            'image' => 'mtn_dew.jpg',
            'price' => '99.99',
            'category_id' => 2
        ]);


        Role::factory()->create([
            'name' => 'user'
        ]);

        Role::factory()->create([
            'name' => 'admin'
        ]);

        Role::factory()->create([
            'name' => 'cooker'
        ]);

        Role::factory()->create([
            'name' => 'courier'
        ]);

        Role::factory()->create([
            'name' => 'manager'
        ]);

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.ru',
            'password' => 'admin',
            'role_id' => 2
        ]);


        $cart = Cart::factory()->create([
            'user_id' => 1
        ]);

        $user = User::factory()->create([
            'name' => 'test_user',
            'email' => 'test@test.ru',
            'password' => 'test',
        ]);

        $cart = Cart::factory()->create([
            'user_id' => 2
        ]);

        $user = User::factory()->create([
            'name' => 'cooker_test',
            'email' => 'cooker@mail.ru',
            'password' => '123',
            'role_id' => 3
        ]);

        $cart = Cart::factory()->create([
            'user_id' => 3
        ]);

        $user = User::factory()->create([
            'name' => 'courier_test',
            'email' => 'courier@pizza.ru',
            'password' => 'pizza',
            'role_id' => 4
        ]);

        $cart = Cart::factory()->create([
            'user_id' => 4
        ]);

        $user = User::factory()->create([
            'name' => 'manager_test',
            'email' => 'manager@pizza.ru',
            'password' => 'manager',
            'role_id' => 5
        ]);

        $cart = Cart::factory()->create([
            'user_id' => 5
        ]);

        Status::factory()->create([
            'title' => 'not paid'
        ]);

        Status::factory()->create([
            'title' => 'waiting for cooker'
        ]);

        Status::factory()->create([
            'title' => 'cooking'
        ]);

        Status::factory()->create([
            'title' => 'waiting for courier'
        ]);

        Status::factory()->create([
            'title' => 'delivering'
        ]);

        Status::factory()->create([
            'title' => 'waiting for acceptance/payment'
        ]);

        Status::factory()->create([
            'title' => 'delivered'
        ]);

    }
}
