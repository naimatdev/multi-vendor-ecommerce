<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetail;
class vendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $vendorRecord = [
         
            ['id'=>1,'vendor_id'=>1,'account_holder_name'=>'Ali Khan','bank_name'=>'Allied','bank_number'=>'01007832880032','bank_ifsc_code'=>'73283' ],
            ];

            VendorsBankDetail::insert($vendorRecord);
    }
}
