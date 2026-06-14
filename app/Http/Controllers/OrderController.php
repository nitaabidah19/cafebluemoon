<?php
// File: app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // READ - tampilkan semua pesanan
    public function index()
    {
        $orders = Order::with('menu')->latest()->get();
        return view('order.index', compact('orders'));
    }

    // SHOW - detail pesanan
    public function show(Order $order)
    {
        $order->load('menu.category');
        return view('order.show', compact('order'));
    }

    // CREATE - form pesan
    public function create()
    {
        $menus = Menu::with('category')->where('is_available', true)->get();
        return view('order.create', compact('menus'));
    }

    // STORE - simpan pesanan
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:100',
            'table_number'  => 'required|string|max:10',
            'menu_id'       => 'required|exists:menus,id',
            'quantity'      => 'required|integer|min:1',
            'note'          => 'nullable|string',
        ]);

        $menu = Menu::findOrFail($request->menu_id);
        $total = $menu->price * $request->quantity;

        Order::create([
            'customer_name' => $request->customer_name,
            'table_number'  => $request->table_number,
            'menu_id'       => $request->menu_id,
            'quantity'      => $request->quantity,
            'total_price'   => $total,
            'note'          => $request->note,
            'status'        => 'pending',
        ]);

        return redirect()->route('order.index')
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    // UPDATE STATUS - ganti status pesanan
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,process,done,cancelled',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('order.index')
            ->with('success', 'Status pesanan berhasil diperbarui!');
    }

    // DELETE - hapus pesanan
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')
            ->with('success', 'Pesanan berhasil dihapus!');
    }
}
