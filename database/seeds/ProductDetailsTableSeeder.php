<?php

use Illuminate\Database\Seeder;

class ProductDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('product_details')->truncate();
         $faker = Faker\Factory::create();
    	for ($i = 0; $i < 15; $i++) {
            DB::table('product_details')->insert([ //,
                'product_id'=>'1',
                'size_id'=>'1',
                'color_id'=>'1',
                'quantity'=>'100',
            ]);
        }
    }
}
