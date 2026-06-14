{{-- File: resources/views/category/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Kategori')
@section('page-title')
🏷️ <span>Kategori</span> Menu
@endsection

@section('content')

<div class="page-header">
    <h2>Daftar <span>Kategori</span></h2>
    <a href="{{ route('category.create') }}" class="btn btn-gold">+ Tambah Kategori</a>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Icon</th>
                <th>Nama Kategori</th>
                <th>Jumlah Menu</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td style="color:var(--gray);">{{ $loop->iteration }}</td>
                <td style="font-size:22px;">{{ $category->icon ?? '🍽️' }}</td>
                <td style="font-weight:500;">{{ $category->name }}</td>
                <td>
                    <span class="badge badge-process">{{ $category->menus_count }} Menu</span>
                </td>
                <td style="color:var(--gray); font-size:12px;">
                    {{ $category->created_at->format('d M Y') }}
                </td>
                <td>
                    <a href="{{ route('category.edit', $category) }}" class="btn btn-outline btn-sm">Edit</a>
                    <form action="{{ route('category.destroy', $category) }}" method="POST"
                          style="display:inline;"
                          onsubmit="return confirm('Hapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center; color:var(--gray); padding:32px;">
                    Belum ada kategori. <a href="{{ route('category.create') }}" style="color:var(--gold);">Tambah sekarang →</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
