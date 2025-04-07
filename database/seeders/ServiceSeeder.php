<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Tashqi yuvish',
                'description' => 'Avtomobilning tashqi qismini yuvish, shu jumladan g‘ildiraklar va oynalarni tozalash.',
                'price' => 50000.00,
                'duration' => 30,
                'is_active' => 1, // Faol
            ],
            [
                'name' => 'Ichki tozalash',
                'description' => 'Avtomobilning ichki qismini tozalash, o‘rindiqlarni changyutgich bilan tozalash va panelni artish.',
                'price' => 70000.00,
                'duration' => 60,
                'is_active' => 1, // Faol
            ],
            [
                'name' => 'To‘liq detailing',
                'description' => 'Avtomobilning tashqi va ichki qismini to‘liq tozalash, jilolash va himoya qilish.',
                'price' => 200000.00,
                'duration' => 180,
                'is_active' => 1, // Faol
            ],
            [
                'name' => 'Keramik qoplama',
                'description' => 'Avtomobil bo‘yog‘iga keramik qoplama qo‘llash, uzoq muddatli himoya va yaltirash uchun.',
                'price' => 500000.00,
                'duration' => 300,
                'is_active' => 0, // Faol emas (masalan, hozircha bu xizmat taqdim etilmaydi)
            ],
            [
                'name' => 'O‘rindiqlarni yuvish',
                'description' => 'Avtomobil o‘rindiqlarini maxsus uskunalar bilan chuqur tozalash va dog‘larni olib tashlash.',
                'price' => 100000.00,
                'duration' => 90,
                'is_active' => 1, // Faol
            ],
            [
                'name' => 'Motor tozalash',
                'description' => 'Avtomobil motorini maxsus kimyoviy moddalar bilan tozalash va himoya qilish.',
                'price' => 80000.00,
                'duration' => 60,
                'is_active' => 1, // Faol
            ],
            [
                'name' => 'Shisha va oynalarni tozalash',
                'description' => 'Avtomobilning barcha oynalari va shishalarini tozalash, dog‘larni olib tashlash.',
                'price' => 30000.00,
                'duration' => 20,
                'is_active' => 1, // Faol
            ],
            [
                'name' => 'G‘ildiraklarni jilolash',
                'description' => 'Avtomobil g‘ildiraklarini tozalash, jilolash va himoya qilish.',
                'price' => 60000.00,
                'duration' => 45,
                'is_active' => 0, // Faol emas (masalan, ushbu xizmat vaqtincha to‘xtatilgan)
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
