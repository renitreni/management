<?php

namespace Modules\Inventory\Database\Seeders;

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Inventory\Entities\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Product::truncate();
        for($x=0; $x<10000; $x++) {
            $faker = Factory::create();
            $product = new Product();
            $product->name = $faker->word();
            $product->code = $faker->creditCardNumber();
            $product->category = $faker->word();
            $product->color = $faker->colorName;
            $product->size = $faker->randomFloat();
            $product->weight = $faker->randomFloat();
            $product->sku = $faker->bankAccountNumber;
            $product->manufacturer = $faker->company;
            $product->discontinued = '0';
            $product->assigned_to = User::all()->random(2)[0]->id;
            $product->save();
        }
    }
}
