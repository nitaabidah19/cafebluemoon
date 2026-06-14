{{-- File: resources/views/order/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Buat Pesanan')
@section('page-title')
📋 Buat <span>Pesanan</span>
@endsection

@section('content')

<div style="max-width:560px;">
    <div class="card card-gold">
        <form action="{{ route('order.store') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Pelanggan *</label>
                    <input type="text" name="customer_name" value="{{ old('customer_name') }}"
                           placeholder="contoh: Budi" required>
                </div>
                <div class="form-group">
                    <label>Nomor Meja *</label>
                    <input type="text" name="table_number" value="{{ old('table_number') }}"
                           placeholder="contoh: A1" required>
                </div>
            </div>

            <div class="form-group">
                <label>Pilih Menu *</label>
                <select name="menu_id" required id="menuSelect" onchange="updateHarga()">
                    <option value="">-- Pilih Menu --</option>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}"
                                data-harga="{{ $menu->price }}"
                                {{ old('menu_id') == $menu->id ? 'selected' : '' }}>
                            {{ $menu->category->icon ?? '' }} {{ $menu->name }}
                            — Rp {{ number_format($menu->price,0,',','.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label>Jumlah *</label>
                    <input type="number" name="quantity" id="qty" value="{{ old('quantity', 1) }}"
                           min="1" required onchange="updateHarga()">
                </div>
                <div class="form-group">
                    <label>Estimasi Total</label>
                    <input type="text" id="estimasiTotal" value="Rp 0" readonly
                           style="color:var(--gold); font-weight:600;">
                </div>
            </div>

            <div class="form-group">
                <label>Catatan (opsional)</label>
                <textarea name="note" placeholder="contoh: tanpa gula, tambah es...">{{ old('note') }}</textarea>
            </div>

            <div class="divider-gold"></div>

            <div style="display:flex; gap:10px;">
                <button type="submit" class="btn btn-gold">Buat Pesanan</button>
                <a href="{{ route('order.index') }}" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
function updateHarga() {
    const sel = document.getElementById('menuSelect');
    const qty = parseInt(document.getElementById('qty').value) || 1;
    const opt = sel.options[sel.selectedIndex];
    const harga = parseFloat(opt.dataset.harga) || 0;
    const total = harga * qty;
    document.getElementById('estimasiTotal').value =
        'Rp ' + total.toLocaleString('id-ID');
}
</script>

@endsection
