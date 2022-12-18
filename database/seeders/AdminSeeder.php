<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        Admin::where('id',1)->delete();
        Admin::create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'name'=>'admin',
            'id'=>1,
        ]);
    }
}
