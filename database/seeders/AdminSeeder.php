<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\SuperAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
                'username' => '@dminCHALL',
                'password' => Hash::make('@dminCh@ll'),
        ]);
    }
}
