<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');

        /*
                Customer Seeders
        */
        // Create 10 customers
        for ($i = 0; $i < 10; $i++)
        {
            DB::table('customers')->insert([
                'name'      => $faker->name(),
                'phone'     => rand(000000000, 999999999),
                'email'     => $faker->email,
                'address1'  => $faker->streetAddress,
                'address2'  => $faker->secondaryAddress,
                'state'     => $faker->stateAbbr,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        /*
                Menu Seeders
        */
        DB::table('menus')->insert([
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
            'name' => 'Breakfast',
            'desc' => 'Breakfast Menu'
        ]);

        DB::table('menus')->insert([
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
            'name' => 'Lunch',
            'desc' => 'Lunch Menu'
        ]);
        DB::table('menus')->insert([
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
            'name' => 'Dinner',
            'desc' => 'Dinner Menu'
        ]);
        DB::table('menus')->insert([
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
            'name' => 'Drinks',
            'desc' => 'Drinks Menu'
        ]);
        DB::table('menus')->insert([
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
            'name' => 'Desert',
            'desc' => 'Desert Menu'
        ]);
        
        /*
                Menu Item Seeders
        */
        // Dinner Menu Items
        DB::table('menu_items')->insert([
            'name'              => 'Pasta',
            'instock'           => 5,
            'item_description'  => 'A bowl of pasta',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'cost'              => 7,
            'price'             => 15,
            'menu_id'           => 3,
            'takeaway'          => false,
        ]);
        DB::table('menu_items')->insert([
            'name'              => '300g Porterhouse',
            'instock'           => 5,
            'item_description'  => 'A 300g angus porterhouse steak w/chips and salad',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'cost'              => 7,
            'price'             => 15,
            'menu_id'           => 3,
            'takeaway'          => false,
        ]);

        // Lunch Menu Items
        DB::table('menu_items')->insert([
            'name'              => 'Pizza',
            'instock'           => 10,
            'item_description'  => 'A fresh made italian style pizza',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'cost'              => 7,
            'price'             => 15,
            'menu_id'           => 2,
            'takeaway'          => true,
        ]);
        DB::table('menu_items')->insert([
            'name'              => 'Pasta',
            'instock'           => 5,
            'item_description'  => 'A bowl of pasta',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'cost'              => 7,
            'price'             => 15,
            'menu_id'           => 2,
            'takeaway'          => true,
        ]);

        // Breakfast Menu Items
        DB::table('menu_items')->insert([
            'name'              => 'Fruit salad with yoghurt',
            'instock'           => 10,
            'item_description'  => 'A bowl of fresh made fruit salad with yoghurt',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'cost'              => 4,
            'price'             => 8,
            'menu_id'           => 1,
            'takeaway'          => false,
        ]);
        DB::table('menu_items')->insert([
            'name'              => 'Toast',
            'instock'           => 100,
            'item_description'  => 'Two slices of toast with house made jam',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'cost'              => 2,
            'price'             => 7,
            'menu_id'           => 1,
            'takeaway'          => false,
        ]);

        DB::table('menu_items')->insert([
            'name'              => 'Hot Chips',
            'instock'           => 30,
            'item_description'  => 'A bucket of hot potato chips with sauce',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'cost'              => 1,
            'price'             => 4,
            'menu_id'           => 4,
            'takeaway'          => true,
        ]);
        DB::table('menu_items')->insert([
            'name'              => 'Beef Pie',
            'instock'           => 30,
            'item_description'  => 'Classic style beef pie',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'cost'              => 2,
            'price'             => 4,
            'menu_id'           => 2,
            'takeaway'          => true,
        ]);
        /*
                User Seeder
        */
        DB::table('users')->insert([
            'name'      => 'Admin',
            'email'     => 'admin@email.com',
            'password'  => 'password',
        ]);
        /*
                Staff seeder
        */
        DB::table('staff')->insert([
            'name'      => $faker->name(),
            'phone'     => '555' . rand(001, 999),
            'user_id'   => 1,
        ]);
    }
}
