<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('categories')->truncate();
         $faker = Faker\Factory::create();
    	for ($i = 0; $i < 10; $i++) {
            DB::table('categories')->insert([ //,
                'name' => $faker->name,
        		'slug' =>$faker->slug(),
            ]);
        }
    }
}
