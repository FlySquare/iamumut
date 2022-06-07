<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class todoapp_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\todoapp_users();
        $user->username = 'demo';
        $user->email = 'demo@demo.com';
        $user->password = md5(md5('demo'));
        $user->save();
    }
}
