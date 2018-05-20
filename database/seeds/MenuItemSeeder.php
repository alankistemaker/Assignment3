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
        DB::table('menu_items')->insert([
            'name'              => $faker->word,
            'instock'           => 10,
            'item_description'  => $faker->sentence($nbwords = 4, $variableNbWords = true),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'cost'              => 10,
            'price'             => 15,
            'menu_id'           => 1,
        ]);
    }
}
