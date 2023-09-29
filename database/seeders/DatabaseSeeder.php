<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Ingredient;
use App\Models\Item;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use App\Models\WorkPosition;
use Database\Factories\WorkPositionFactory;
use Illuminate\Database\Seeder;
use App\Models\Pizza;

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
            'image' => 'chedder.jpg',
            'price' => '599.99',
            'category_id' => 1
        ]);

        $pizza->ingredients()->attach(1);
        $pizza->ingredients()->attach(2);
        $pizza->ingredients()->attach(3);
        $pizza->ingredients()->attach(4);


        Role::factory()->create([
            'name' => 'user'
        ]);

        Role::factory()->create([
            'name' => 'admin'
        ]);

        Role::factory()->create([
            'name' => 'manager'
        ]);

        Role::factory()->create([
            'name' => 'cooker'
        ]);

        Role::factory()->create([
            'name' => 'courier'
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

        Employee::factory()->create([
           'user_id' => 1,
           'role_id' => 2
        ]);


    }
}
