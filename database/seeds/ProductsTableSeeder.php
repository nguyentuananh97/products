<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
         $faker = Faker\Factory::create();
    	for ($i = 0; $i < 30; $i++) {
            DB::table('products')->insert([ //,
                'name' => $faker->name,
        		'original_price' =>$faker->numberBetween($min = 1000, $max = 9000),
        		'price' =>$faker->numberBetween($min = 1000, $max = 9000),
        		'description' => $faker->text($maxNbChars = 200),
        		'category_id' => '1',
        		'vendor_id' => '1',
            ]);
        }
    }
}
