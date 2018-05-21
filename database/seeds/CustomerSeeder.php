<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');
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
}
