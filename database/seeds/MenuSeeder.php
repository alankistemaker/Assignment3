<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'name' => 'Takeaway',
            'desc' => 'Takeaway Menu'
        ]);
    }
}
