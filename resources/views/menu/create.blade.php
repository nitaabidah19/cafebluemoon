{{-- File: resources/views/menu/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Tambah Menu')
@section('page-title')
🍽️ Tambah <span>Menu</span>
@endsection

@section('content')

<div style="max-width:640px;">
    <div class="card card-gold">
        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Menu *</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           placeholder="contoh: Cappuccino" required>
                </div>
                <div class="form-group">
                    <label>Kategori *</label>
                    <select name="category_id" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->icon }} {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" placeholder="Deskripsi singkat menu...">{{ old('description') }}</textarea>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label>Harga (Rp) *</label>
                    <input type="number" name="price" value="{{ old('price') }}"
                           placeholder="25000" min="0" required>
                </div>
                <div class="form-group">
                    <label>Foto Menu</label>
                    <input type="file" name="image" accept="image/jpg,image/jpeg,image/png">
                    <div style="font-size:11px; color:var(--gray); margin-top:4px;">
                        JPG/PNG, maksimal 2MB
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label style="display:flex; align-items:center; gap:8px; text-transform:none; letter-spacing:0;">
                    <input type="checkbox" name="is_available" value="1"
                           {{ old('is_available', '1') ? 'checked' : '' }}
                           style="width:auto; accent-color:var(--gold);">
                    <span style="font-size:12px; color:var(--gray);">Menu tersedia / bisa dipesan</span>
                </label>
            </div>

            <div class="divider-gold"></div>

            <div style="display:flex; gap:10px;">
                <button type="submit" class="btn btn-gold">Simpan Menu</button>
                <a href="{{ route('menu.index') }}" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection

