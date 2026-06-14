<?php
// File: app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // READ - tampilkan semua kategori
    public function index()
    {
        $categories = Category::withCount('menus')->latest()->get();
        return view('category.index', compact('categories'));
    }

    // CREATE - form tambah
    public function create()
    {
        return view('category.create');
    }

    // STORE - simpan ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'icon' => 'nullable|string|max:10',
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    // EDIT - form edit
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    // UPDATE - update data
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'icon' => 'nullable|string|max:10',
        ]);

        $category->update($request->all());

        return redirect()->route('category.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    // DELETE - hapus data
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}
