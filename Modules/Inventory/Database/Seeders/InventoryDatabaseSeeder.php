<?php

namespace Modules\Inventory\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Inventory\Database\Seeders\ProductDetailTableSeeder;
use Modules\Inventory\Database\Seeders\PurchaseInfoTableSeeder;
use Modules\Inventory\Database\Seeders\SummaryTableSeeder;
use Modules\Inventory\Database\Seeders\VendorTableSeeder;

class InventoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(ProductTableSeeder::class);
        $this->call(VendorTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(SupplyTableSeeder::class);
        $this->call(PurchaseInfoTableSeeder::class);
        $this->call(SalesOrderTableSeeder::class);
        $this->call(ProductDetailTableSeeder::class);
        $this->call(SummaryTableSeeder::class);
    }
}
