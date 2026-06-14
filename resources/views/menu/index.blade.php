{{-- File: resources/views/menu/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Menu')
@section('page-title')
🍽️ <span>Menu</span> Cafe
@endsection

@section('content')

<div class="page-header">
    <h2>Daftar <span>Menu</span></h2>
    <a href="{{ route('menu.create') }}" class="btn btn-gold">+ Tambah Menu</a>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nama Menu</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Tersedia</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menus as $menu)
            <tr>
                <td style="color:var(--gray);">{{ $loop->iteration }}</td>
                <td>
                    @if($menu->image)
                        <img src="{{ asset('uploads/' . $menu->image) }}"
                             alt="{{ $menu->name }}" class="menu-img">
                    @else
                        <div class="no-img">🍽️</div>
                    @endif
                </td>
                <td>
                    <div style="font-weight:500;">{{ $menu->name }}</div>
                    <div style="font-size:11px; color:var(--gray);">
                        {{ Str::limit($menu->description, 40) }}
                    </div>
                </td>
                <td>
                    <span style="font-size:16px;">{{ $menu->category->icon ?? '' }}</span>
                    {{ $menu->category->name ?? '-' }}
                </td>
                <td style="color:var(--gold-lt); font-weight:500;">
                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                </td>
                <td>
                    @if($menu->is_available)
                        <span class="badge badge-done">Tersedia</span>
                    @else
                        <span class="badge badge-cancelled">Habis</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('menu.edit', $menu) }}" class="btn btn-outline btn-sm">Edit</a>
                    <form action="{{ route('menu.destroy', $menu) }}" method="POST"
                          style="display:inline;"
                          onsubmit="return confirm('Hapus menu ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align:center; color:var(--gray); padding:32px;">
                    Belum ada menu. <a href="{{ route('menu.create') }}" style="color:var(--gold);">Tambah sekarang →</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
