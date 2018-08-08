<?php

use Illuminate\Database\Seeder;

class GallariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gallaries')->truncate();
         $faker = Faker\Factory::create();
    	for ($i = 0; $i < 30; $i++) {
            DB::table('gallaries')->insert([ //,
                'link' => $faker->imageUrl($width = 370, $height = 459),
                'productDetail_id'=>'37',
            ]);
        }
    }
}
