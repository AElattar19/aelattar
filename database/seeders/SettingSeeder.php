<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'title' => 'A.Elattar',
            'des' => 'user@gmail.com',
            'mk' => 'user@gmail.com',
            'md' => 'user@gmail.com',
            'youtube' => 'user@gmail.com',
            'facebook' => 'user@gmail.com',
            'github' => 'user@gmail.com',
            'linkedin' => 'user@gmail.com',
        ]);
    }
}
