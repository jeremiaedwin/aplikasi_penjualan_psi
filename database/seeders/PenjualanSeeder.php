<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;
use DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
    	for($i = 1; $i <= 700; $i++){
            $product = Product::find($faker->numberBetween(1,3));
            $price = $product->harga_produk;
            $qty = $faker->randomDigitNot(0);
    		DB::table('penjualans')->insert([
    			'product_id' => $product->id,
    			'kasir_id' => 1,
                'store_id' => $faker->numberBetween(1,7),
    			'quantity' => $qty,
    			'total' => $qty * $price,
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d")
    		]);
 
    	}
    }
}
