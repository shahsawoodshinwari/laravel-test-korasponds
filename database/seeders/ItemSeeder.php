<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            ['name' => 'Apple iPhone 13', 'arabic_name' => 'آيفون 13', 'price' => 4999, 'stock' => 10],
            ['name' => 'Samsung Galaxy S22', 'arabic_name' => 'سامسونج جالكسي S22', 'price' => 3999, 'stock' => 8],
            ['name' => 'Sony WH-1000XM4', 'arabic_name' => 'سوني WH-1000XM4', 'price' => 1299, 'stock' => 5],
            ['name' => 'Dell XPS 15', 'arabic_name' => 'ديل XPS 15', 'price' => 8999, 'stock' => 4],
            ['name' => 'Air Purifier', 'arabic_name' => 'مُنقي الهواء', 'price' => 699, 'stock' => 20],
            ['name' => 'LED Light Bulb', 'arabic_name' => 'مصباح LED', 'price' => 30, 'stock' => 100],
            ['name' => 'Laptop Stand', 'arabic_name' => 'حامل اللابتوب', 'price' => 150, 'stock' => 15],
            ['name' => 'Electric Kettle', 'arabic_name' => 'غلاية كهربائية', 'price' => 199, 'stock' => 12],
            ['name' => 'Coffee Maker', 'arabic_name' => 'ماكينة قهوة', 'price' => 599, 'stock' => 7],
            ['name' => 'Yoga Mat', 'arabic_name' => 'حصيرة يوغا', 'price' => 120, 'stock' => 30],
        ]);
    }
}
