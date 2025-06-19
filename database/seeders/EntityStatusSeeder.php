<?php

   namespace Database\Seeders;

   use Illuminate\Database\Seeder;
   use App\Models\EntityStatus;

   class EntityStatusSeeder extends Seeder
   {
       public function run()
       {
           $statuses = [
               ['name' => 'Visible'],
               ['name' => 'Disabled'],
           ];

           foreach ($statuses as $status) {
               EntityStatus::firstOrCreate(['name' => $status['name']]);
           }
       }
   }
   