<?php

namespace Database\Seeders;

use App\Models\Click;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClickSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Click::create([
            'ip' => '127.0.0.1',
            'device_info' => 'Desktop',
            'id_shortlink' => 1,
        ]);
    }
}
