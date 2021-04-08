<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 
    public function run()
    {
        $navigation=[['Home','home'],['Login','login'],['Register','register']];

        foreach($navigation as $n){
            Navigation::create([
                'name'=>$n[0],
                'href'=>$n[1]
            ]);
        }
    }
}
