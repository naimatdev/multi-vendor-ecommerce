<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\vendor;
class vendorsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $vendorRecords =[
            ['id'=>1,'name'=>'Ali','address'=>'settelite Town', 'city'=>'Rawalpindi','state'=>'islmabad','country'=>'Pakistan','pincode'=>'100033','mobile'=>'0304324539','email'=>'ali@gmail.com','status'=>0],  
        ]; 
        Vendor::insert($vendorRecords);
    }
}
