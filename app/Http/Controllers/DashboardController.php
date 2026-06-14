<?php
// File: app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMenu       = Menu::count();
        $totalCategory   = Category::count();
        $totalOrder      = Order::count();
        $pendingOrder    = Order::where('status', 'pending')->count();
        $recentOrders    = Order::with('menu')->latest()->take(5)->get();
        $totalRevenue    = Order::where('status', 'done')->sum('total_price');

        return view('dashboard', compact(
            'totalMenu',
            'totalCategory',
            'totalOrder',
            'pendingOrder',
            'recentOrders',
            'totalRevenue'
        ));
    }
}
