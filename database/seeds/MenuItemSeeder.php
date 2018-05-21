<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');
        
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
        ]);

        // Takeaway Menu Items
        DB::table('menu_items')->insert([
            'name'              => 'Hot Chips',
            'instock'           => 30,
            'item_description'  => 'A bucket of hot potato chips with sauce',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'cost'              => 1,
            'price'             => 4,
            'menu_id'           => 4,
        ]);
        DB::table('menu_items')->insert([
            'name'              => 'Beef Pie',
            'instock'           => 30,
            'item_description'  => 'Classic style beef pie',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'cost'              => 2,
            'price'             => 4,
            'menu_id'           => 4,
        ]);
    }
}
