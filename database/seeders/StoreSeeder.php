<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
    	for($i = 1; $i <= 10; $i++){
    		DB::table('stores')->insert([
    			'address' => $faker->address(),
    			'city' => $faker->city(),
                'province' => $faker->state(),
                'created_at' => $faker->date(),
                'updated_at' => $faker->date()
    		]);
 
    	}
    }
}
