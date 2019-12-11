<?php
namespace Modules\Inventory\Database\Seeders;

use Modules\Inventory\PurchaseInfo;
use Modules\Inventory\Summary;
use Illuminate\Database\Seeder;
use Faker\Factory;

class SummaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Summary::truncate();
        $ids = PurchaseInfo::query()->select('id')->get()->pluck('id');
        foreach($ids as $id) {
            $faker = Factory::create();
            $summary = new Summary();
            $summary->purchase_detail_id = $id;
            $summary->discount = $faker->randomDigit();
            $summary->sub_total = 0;
            $summary->shipping = $faker->randomDigit();
            $summary->sales_tax = $faker->randomDigit();
            $summary->save();
        }
    }
}
