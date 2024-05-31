<?php

namespace Database\Seeders;

use App\Models\Shortlink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShortlinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shortlink::create([
            'real_url' => 'https://example.com',
            'short_url' => Str::random(6),
            'id_user' => 1,
        ]);
    }
}
