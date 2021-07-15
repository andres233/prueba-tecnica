<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$products = [
    		[
    			'name' => "Boleta de prueba 1",
    			'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.",
    			'units' => 21,
    			'price' => 125000,
    			'image' => "https://www.pngitem.com/pimgs/m/282-2825770_theater-tickets-clipart-hd-png-download.png"
    		],
    		[
    			'name' => "Boleta de prueba 2",
    			'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.",
    			'units' => 400,
    			'price' => 58000,
    			'image' => "https://www.pngitem.com/pimgs/m/282-2825770_theater-tickets-clipart-hd-png-download.png"
    		],
    		[
    			'name' => "Boleta de prueba 3",
    			'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.",
    			'units' => 37,
    			'price' => 37800,
    			'image' => "https://www.pngitem.com/pimgs/m/282-2825770_theater-tickets-clipart-hd-png-download.png"
    		],
    		[
    			'name' => "Boleta de prueba 4",
    			'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.",
    			'units' => 10,
    			'price' => 176000,
    			'image' => "https://www.pngitem.com/pimgs/m/282-2825770_theater-tickets-clipart-hd-png-download.png"
			],
			[
    			'name' => "Boleta de prueba 5",
    			'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.",
    			'units' => 4,
    			'price' => 58340,
    			'image' => "https://www.pngitem.com/pimgs/m/282-2825770_theater-tickets-clipart-hd-png-download.png"
    		]
    	];

    	foreach ($products as $product) {
    		Product::create($product);
    	}

    }
}
