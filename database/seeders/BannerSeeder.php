<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        banner::create([
            'headline' => 'NEW ERA OF SMARTPHONES',
            'banner' => 'images/banner_product.jpg',
        ]);
    }
}
