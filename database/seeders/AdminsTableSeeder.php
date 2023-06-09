<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminsRecords = [
             ['id' =>2, 'name'=>'Ali','type'=>'vendor','vendor_id'=>1,
             'mobile'=>'894354534','email'=>'ali@gmail.com', 'password'=>'$2y$10$MGO2TRJcsf2RKDPAPv70GerGTuDWuzo71.Y2fCrRGdLZCLXqRvl9S',
             'image'=>'', 'status'=>0],
        ];
             Admin::insert($adminsRecords);
        }
    }

