{{-- File: resources/views/menu/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Menu')
@section('page-title')
📋 Buat <span>Pesanan</span>
@endsection

@section('content')

<div style="max-width:640px;">
    <div class="card card-gold">
        <form action="{{ route('menu.update', $menu) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Menu *</label>
                    <input type="text" name="name" value="{{ old('name', $menu->name) }}" required>
                </div>
                <div class="form-group">
                    <label>Kategori *</label>
                    <select name="category_id" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ old('category_id', $menu->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->icon }} {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description">{{ old('description', $menu->description) }}</textarea>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label>Harga (Rp) *</label>
                    <input type="number" name="price" value="{{ old('price', $menu->price) }}"
                           min="0" required>
                </div>
                <div class="form-group">
                    <label>Foto Baru (opsional)</label>
                    @if($menu->image)
                        <div style="margin-bottom:8px;">
                            <img src="{{ asset('uploads/'.$menu->image) }}"
                                 style="height:60px; border-radius:6px; border:1px solid rgba(201,168,76,0.3);">
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/jpg,image/jpeg,image/png">
                    <div style="font-size:11px; color:var(--gray); margin-top:4px;">
                        Kosongkan jika tidak ingin ganti foto
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label style="display:flex; align-items:center; gap:8px; text-transform:none; letter-spacing:0;">
                    <input type="checkbox" name="is_available" value="1"
                           {{ old('is_available', $menu->is_available) ? 'checked' : '' }}
                           style="width:auto; accent-color:var(--gold);">
                    <span style="font-size:12px; color:var(--gray);">Menu tersedia / bisa dipesan</span>
                </label>
            </div>

            <div class="divider-gold"></div>

            <div style="display:flex; gap:10px;">
                <button type="submit" class="btn btn-gold">Update Menu</button>
                <a href="{{ route('menu.index') }}" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>

