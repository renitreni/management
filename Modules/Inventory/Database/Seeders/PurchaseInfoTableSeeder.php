<?php
namespace Modules\Inventory\Database\Seeders;

use Modules\Inventory\PurchaseInfo;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class PurchaseInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PurchaseInfo::truncate();
        for($x=0; $x<10000; $x++) {
            $faker = Factory::create();
            $purchase_info = new PurchaseInfo();
            $purchase_info->subject = $faker->company;
            $purchase_info->vendor_name = $faker->word;
            $purchase_info->requisition_no = $faker->bankAccountNumber;
            $purchase_info->tracking_number = $faker->bankAccountNumber;
            $purchase_info->contact_name = $faker->firstName();
            $purchase_info->phone = $faker->phoneNumber;
            $purchase_info->due_date = $faker->date();
            $purchase_info->fax = $faker->phoneNumber;
            $purchase_info->carrier = $faker->company;
            $purchase_info->deliver_to = $faker->country;
            $purchase_info->shipping_method = $faker->word;
            $purchase_info->assigned_to = User::all()->random(2)[0]->id;
            $purchase_info->status = $faker->randomElement(['Created','Ordered','Shipped','Received','Invoiced','Paid','Completed']);
            $purchase_info->date_received = $faker->date();
            $purchase_info->sales_order = $faker->randomNumber();
            $purchase_info->purchase_order = $faker->randomNumber();
            $type = $faker->randomElement(['Cash','Credit','Check']);
            $purchase_info->payment_method = $type;
            if($type == 'Check') {
                $purchase_info->check_number = $faker->creditCardNumber;
                $purchase_info->check_writer = $faker->firstName();
            }
            $purchase_info->billing_address = $faker->address;
            $purchase_info->delivery_address = $faker->address;
            $purchase_info->tac = $faker->paragraph();
            $purchase_info->description = $faker->paragraph();
            $purchase_info->save();
        }
    }
}
