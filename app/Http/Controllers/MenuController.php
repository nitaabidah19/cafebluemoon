<?php
// File: app/Http/Controllers/MenuController.php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // READ - tampilkan semua menu
    public function index()
    {
        $menus = Menu::with('category')->latest()->get();
        return view('menu.index', compact('menus'));
    }

    // CREATE - form tambah
    public function create()
    {
        $categories = Category::all();
        return view('menu.create', compact('categories'));
    }

    // STORE - simpan + upload gambar
    public function store(Request $request)
    {
        $request->validate([
            'category_id'  => 'required|exists:categories,id',
            'name'         => 'required|string|max:100',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric|min:0',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_available' => 'boolean',
        ]);

        $data = $request->except('image');
        $data['is_available'] = $request->has('is_available') ? 1 : 0;

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $namaFile = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $namaFile);
            $data['image'] = $namaFile;
        }

        Menu::create($data);

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil ditambahkan!');
    }

    // EDIT - form edit
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('menu.edit', compact('menu', 'categories'));
    }

    // UPDATE - update + upload gambar baru
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'category_id'  => 'required|exists:categories,id',
            'name'         => 'required|string|max:100',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric|min:0',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_available' => 'boolean',
        ]);

        $data = $request->except('image');
        $data['is_available'] = $request->has('is_available') ? 1 : 0;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($menu->image && file_exists(public_path('uploads/' . $menu->image))) {
                unlink(public_path('uploads/' . $menu->image));
            }
            $namaFile = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $namaFile);
            $data['image'] = $namaFile;
        }

        $menu->update($data);

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil diperbarui!');
    }

    // DELETE - hapus menu + gambar
    public function destroy(Menu $menu)
    {
        if ($menu->image && file_exists(public_path('uploads/' . $menu->image))) {
            unlink(public_path('uploads/' . $menu->image));
        }
        $menu->delete();

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil dihapus!');
    }
}
