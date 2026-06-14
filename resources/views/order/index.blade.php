{{-- File: resources/views/order/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Pesanan')
@section('page-title')
📋 <span>Pesanan</span> Masuk
@endsection

@section('content')

<div class="page-header">
    <h2>Daftar <span>Pesanan</span></h2>
    <a href="{{ route('order.create') }}" class="btn btn-gold">+ Buat Pesanan</a>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Pelanggan</th>
                <th>Menu</th>
                <th>Meja</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td style="color:var(--gray);">{{ $order->id }}</td>
                <td style="font-weight:500;">{{ $order->customer_name }}</td>
                <td>{{ $order->menu->name ?? '-' }}</td>
                <td style="text-align:center;">
                    <span class="badge badge-process">{{ $order->table_number }}</span>
                </td>
                <td style="text-align:center;">{{ $order->quantity }}</td>
                <td style="color:var(--gold-lt); font-weight:500;">
                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                </td>
                <td>
                    <span class="badge badge-{{ $order->status }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                <td>
                    <!-- Update Status -->
                    <form action="{{ route('order.status', $order) }}" method="POST"
                          style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <select name="status" onchange="this.form.submit()"
                                style="padding:4px 8px; font-size:11px; border-radius:5px;
                                       background:rgba(26,58,92,0.6); border:1px solid rgba(184,212,232,0.2);
                                       color:var(--white); cursor:pointer; outline:none;">
                            @foreach(['pending','process','done','cancelled'] as $s)
                                <option value="{{ $s }}" {{ $order->status==$s ? 'selected' : '' }}>
                                    {{ ucfirst($s) }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                    <a href="{{ route('order.show', $order) }}" class="btn btn-outline btn-sm">Detail</a>
                    <form action="{{ route('order.destroy', $order) }}" method="POST"
                          style="display:inline;"
                          onsubmit="return confirm('Hapus pesanan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align:center; color:var(--gray); padding:32px;">
                    Belum ada pesanan masuk.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
