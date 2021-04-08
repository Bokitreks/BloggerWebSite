<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[['admin','admin','admin@gmail.com','admin123',2],['user','user','user@gmail.com','user123',1]];

        foreach($users as $u){
            User::create([
             'firstName'=>$u[0],
             'lastName'=>$u[1],
             'mail'=>$u[2],
             'password'=> Hash::make($u[3]),
             'role_id'=>$u[4]
            ]);
         }
    }
}
