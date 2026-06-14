{{-- File: resources/views/category/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Tambah Kategori')
@section('page-title')
🏷️ Tambah <span>Kategori</span>
@endsection

@section('content')

<div style="max-width:500px;">
    <div class="card card-gold">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Kategori *</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       placeholder="contoh: Minuman Panas" required>
            </div>

            <div class="form-group">
                <label>Icon (Emoji)</label>
                <input type="text" name="icon" value="{{ old('icon') }}"
                       placeholder="contoh: ☕" maxlength="5">
                <div style="font-size:11px; color:var(--gray); margin-top:4px;">
                    Copy-paste emoji dari keyboard atau situs emojipedia.org
                </div>
            </div>

            <div class="divider-gold"></div>

            <div style="display:flex; gap:10px;">
                <button type="submit" class="btn btn-gold">Simpan Kategori</button>
                <a href="{{ route('category.index') }}" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
