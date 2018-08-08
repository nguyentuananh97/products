<?php

use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('vendors')->truncate();
         $faker = Faker\Factory::create();
    	for ($i = 0; $i < 10; $i++) {
            DB::table('vendors')->insert([ //,
                'name' => $faker->name,
        		'address' => $faker->text($maxNbChars = 30),
        		'hotline' => $faker->phoneNumber,
            ]);
        }
    }
}
