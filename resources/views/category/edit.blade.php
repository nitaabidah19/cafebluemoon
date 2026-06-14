{{-- File: resources/views/category/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Kategori')
@section('page-title')
🏷️ Edit <span>Kategori</span>
@endsection

@section('content')

<div style="max-width:500px;">
    <div class="card card-gold">
        <form action="{{ route('category.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Kategori *</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Icon (Emoji)</label>
                <input type="text" name="icon" value="{{ old('icon', $category->icon) }}"
                       maxlength="5">
            </div>

            <div class="divider-gold"></div>

            <div style="display:flex; gap:10px;">
                <button type="submit" class="btn btn-gold">Update Kategori</button>
                <a href="{{ route('category.index') }}" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
