{{-- File: resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title')
🏠 <span>Dashboard</span>
@endsection

@section('content')

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">🍽️</div>
        <div class="stat-number">{{ $totalMenu }}</div>
        <div class="stat-label">Total Menu</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">🏷️</div>
        <div class="stat-number">{{ $totalCategory }}</div>
        <div class="stat-label">Kategori</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">📋</div>
        <div class="stat-number">{{ $totalOrder }}</div>
        <div class="stat-label">Total Pesanan</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">⏳</div>
        <div class="stat-number" style="color:#ffc107;">{{ $pendingOrder }}</div>
        <div class="stat-label">Pesanan Pending</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">💰</div>
        <div class="stat-number" style="font-size:22px;">Rp {{ number_format($totalRevenue,0,',','.') }}</div>
        <div class="stat-label">Total Pendapatan</div>
    </div>
</div>

<div class="card">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
        <div style="font-family:'Cormorant Garamond',serif; font-size:18px; color:var(--gold);">
            Pesanan Terbaru
        </div>
        <a href="{{ route('order.index') }}" class="btn btn-outline btn-sm">Lihat Semua</a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pelanggan</th>
                    <th>Menu</th>
                    <th>Meja</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentOrders as $order)
                <tr>
                    <td style="color:var(--gray);">{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->menu->name ?? '-' }}</td>
                    <td>{{ $order->table_number }}</td>
                    <td style="color:var(--gold-lt);">Rp {{ number_format($order->total_price,0,',','.') }}</td>
                    <td>
                        <span class="badge badge-{{ $order->status }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; color:var(--gray); padding:24px;">
                        Belum ada pesanan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
