<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;
class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $vendorsRecods =[

            ['id'=>1,'vendor_id'=>1,'shop_name'=>'Ali Electronics store','shop_address'=>'123-scf','shop_city'=>'Islambad','shop_state'=>'Punjab','shop_country'=>'Pakistan','shop_pincode'=>'11002','shop_mobile'=>'034345742','shop_website'=>'ecommerceBuilder.com','shop_email'=>'shop@gmail.com','address_proof'=>'passport','address_proof_image'=>'test.jpg','business_license_number'=>'1234509','gst_number'=>'6666','pan_number'=>'989989'],
        ];
VendorsBusinessDetail::insert($vendorsRecods);
    }

}
