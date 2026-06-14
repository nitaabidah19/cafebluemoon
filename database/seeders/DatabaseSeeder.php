<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Menu;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin BlueMoon',
            'email'    => 'admin@bluemoon.com',
            'password' => Hash::make('password123'),
        ]);

        $categories = [
            ['name' => 'Kopi',     'icon' => '☕'],
            ['name' => 'Non-Kopi', 'icon' => '🥤'],
            ['name' => 'Makanan',  'icon' => '🍱'],
            ['name' => 'Dessert',  'icon' => '🍰'],
            ['name' => 'Snack',    'icon' => '🍟'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        $kopiId    = Category::where('name', 'Kopi')->first()->id;
        $nonKopiId = Category::where('name', 'Non-Kopi')->first()->id;
        $makananId = Category::where('name', 'Makanan')->first()->id;
        $dessertId = Category::where('name', 'Dessert')->first()->id;
        $snackId   = Category::where('name', 'Snack')->first()->id;

        $menus = [
            ['category_id'=>$kopiId,    'name'=>'Espresso',        'price'=>18000],
            ['category_id'=>$kopiId,    'name'=>'Cappuccino',      'price'=>25000],
            ['category_id'=>$nonKopiId, 'name'=>'Matcha Latte',    'price'=>28000],
            ['category_id'=>$makananId, 'name'=>'Nasi Goreng Cafe','price'=>35000],
            ['category_id'=>$dessertId, 'name'=>'Tiramisu',        'price'=>30000],
            ['category_id'=>$snackId,   'name'=>'French Fries',    'price'=>22000],
        ];

        foreach ($menus as $menu) {
            Menu::create(array_merge($menu, ['is_available' => true]));
        }
    }
}