<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\sauce;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$ZkIIwvIBAxGWtB29s1NW1u9VPC3zZBJDpic10u/nYN3LSq/5kijZ.' //admin
        ]);

        sauce::factory()->create([
            'name' => "Hellfire Fear",
            'manufacturer' => 'Hellfire Hot Sauce Inc.',
            'description' => 'Une sauce piquante extrêmement forte, faite avec des piments fantômes.',
            'mainPepper' => 'Piment fantôme',
            'imageUrl' => 'https://culleys.co.nz/cdn/shop/products/Fear_This.png',
            'heat' => 10,
            'userId' => 1,
        ]);

        sauce::factory()->create([
            'name' => "Hellfire Elixir",
            'manufacturer' => 'Hellfire Hot Sauce Inc.',
            'description' => 'Une sauce piquante équilibrée avec une touche de douceur, parfaite pour les plats mexicains.',
            'mainPepper' => 'Piment habanero',
            'imageUrl' => 'https://cdn.shoplightspeed.com/shops/640149/files/25472538/1600x2048x1/hellfire-the-elixir.jpg',
            'heat' => 7,
            'userId' => 1,
        ]);

        sauce::factory()->create([
            'name' => "Tabasco Jalapeno",
            'manufacturer' => "McIlhenny Company",
            'description' => 'Une variante de Tabasco avec une touche de jalapeno pour une saveur unique.',
            'mainPepper' => 'Piment jalapeno',
            'imageUrl' => 'https://tabasco.ch/wp-content/uploads/tabasco-brand-sauce-bottle-60ml-green-jalapeno-sauce.png',
            'heat' => 5,
            'userId' => 1,
        ]);

        sauce::factory()->create([
            'name' => "Sauce Jolokia",
            'manufacturer' => 'MAHI',
            'description' => 'Une sauce piquante intense avec la chaleur des piments jolokia.',
            'mainPepper' => 'Piment jolokia',
            'imageUrl' => 'https://saucymahi.co/cdn/shop/products/MAINIMAGE-5060003830306_T70_85f24295-0ed0-4f6d-ba1f-cd7d80257115_grande.png',
            'heat' => 9,
            'userId' => 1,
        ]);
        
        sauce::factory()->create([
            'name' => "Tabasco",
            'manufacturer' => 'McIlhenny Company',
            'description' => "La sauce piquante classique, parfaite pour ajouter du piquant à n'importe quel plat.",
            'mainPepper' => 'Piment tabasco',
            'imageUrl' => 'https://pngimg.com/d/tabasco_PNG23.png',
            'heat' => 6,
            'userId' => 1,
        ]);

        sauce::factory()->create([
            'name' => "Waha Wera",
            'manufacturer' => 'Kaitaia fire',
            'description' => "Sauce piquante au kiwi et au piment habanero, produite en Nouvelle-Zélande.",
            'mainPepper' => 'Habanero',
            'imageUrl' => 'https://kiwikitchen.sg/wp-content/uploads/2020/11/Kaitaia-Waha-Wera-Kiwifruit-Habanero-Sauce-150ml.png',
            'heat' => 7,
            'userId' => 1,
        ]);

        sauce::factory(2)->create();
    }
}
