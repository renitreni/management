<?php
namespace Modules\Inventory\Database\Seeders;

use Modules\Inventory\ProductDetail;
use Modules\Inventory\PurchaseInfo;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\Supply;

class ProductDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductDetail::truncate();
        for($x=0; $x<3000; $x++) {
            $faker = Factory::create();
            $product = Product::all()->random(5)[1];
            $supply = Supply::query()->where('product_id',$product->id)->get()[0];
            $product_detail = new ProductDetail();
            $product_detail->purchase_order_id = PurchaseInfo::all()->random(10)[3]->id;
            $product_detail->product_id = $product->id;
            $product_detail->product_name = $product->name;
            $product_detail->product_code = $product->code;
            $product_detail->notes = $faker->paragraph;
            $product_detail->qty = 2;
            $product_detail->unit_cost = $supply->unit_cost;
            $product_detail->vendor_price = $faker->randomDigit;
            $product_detail->discount_item = $faker->randomDigit;
            $product_detail->save();
        }


        for($x=0; $x<3000; $x++) {
            $faker = Factory::create();
            $product = Product::all()->random(5)[1];
            $supply = Supply::query()->where('product_id',$product->id)->get()[0];
            $product_detail = new ProductDetail();
            $product_detail->sales_order_id = PurchaseInfo::all()->random(10)[3]->id;
            $product_detail->product_id = $product->id;
            $product_detail->product_name = $product->name;
            $product_detail->product_code = $product->code;
            $product_detail->notes = $faker->paragraph;
            $product_detail->qty = 2;
            $product_detail->unit_cost = $supply->unit_cost;
            $product_detail->vendor_price = $faker->randomDigit;
            $product_detail->discount_item = $faker->randomDigit;
            $product_detail->save();
        }
    }
}
