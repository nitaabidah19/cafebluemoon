{{-- File: resources/views/order/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detail Pesanan')
@section('page-title', '📋 Detail <span>Pesanan</span>')

@section('content')

<div style="max-width:500px;">
    <div class="card card-gold">
        <div style="font-family:'Cormorant Garamond',serif; font-size:20px; color:var(--gold); margin-bottom:20px;">
            Pesanan #{{ $order->id }}
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
            <div>
                <div style="font-size:10px; color:var(--gray); letter-spacing:0.12em; text-transform:uppercase; margin-bottom:4px;">Pelanggan</div>
                <div style="font-size:15px; font-weight:500;">{{ $order->customer_name }}</div>
            </div>
            <div>
                <div style="font-size:10px; color:var(--gray); letter-spacing:0.12em; text-transform:uppercase; margin-bottom:4px;">Meja</div>
                <div style="font-size:15px; font-weight:500;">{{ $order->table_number }}</div>
            </div>
        </div>

        <div class="divider-gold"></div>

        <div style="margin-bottom:16px;">
            <div style="font-size:10px; color:var(--gray); letter-spacing:0.12em; text-transform:uppercase; margin-bottom:8px;">Menu Dipesan</div>
            <div style="display:flex; align-items:center; gap:12px;">
                @if($order->menu->image ?? null)
                    <img src="{{ asset('uploads/'.$order->menu->image) }}"
                         style="width:56px; height:56px; object-fit:cover; border-radius:8px;">
                @else
                    <div style="width:56px; height:56px; background:rgba(26,58,92,0.5); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:24px;">🍽️</div>
                @endif
                <div>
                    <div style="font-weight:500; font-size:15px;">{{ $order->menu->name ?? '-' }}</div>
                    <div style="font-size:12px; color:var(--gray);">
                        {{ $order->menu->category->icon ?? '' }}
                        {{ $order->menu->category->name ?? '' }}
                    </div>
                    <div style="color:var(--gold); font-size:13px;">
                        Rp {{ number_format($order->menu->price ?? 0, 0, ',', '.') }} × {{ $order->quantity }}
                    </div>
                </div>
            </div>
        </div>

        <div class="divider-gold"></div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
            <div>
                <div style="font-size:10px; color:var(--gray); letter-spacing:0.12em; text-transform:uppercase; margin-bottom:4px;">Status</div>
                <span class="badge badge-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
            </div>
            <div>
                <div style="font-size:10px; color:var(--gray); letter-spacing:0.12em; text-transform:uppercase; margin-bottom:4px;">Total</div>
                <div style="font-size:18px; font-weight:600; color:var(--gold);">
                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                </div>
            </div>
        </div>

        @if($order->note)
        <div style="background:rgba(26,58,92,0.4); border-radius:8px; padding:12px; margin-bottom:16px;">
            <div style="font-size:10px; color:var(--gray); margin-bottom:4px; text-transform:uppercase; letter-spacing:0.1em;">Catatan</div>
            <div style="font-size:13px;">{{ $order->note }}</div>
        </div>
        @endif

        <div style="font-size:11px; color:var(--gray);">
            Dibuat: {{ $order->created_at->format('d M Y, H:i') }} WIB
        </div>

        <div class="divider-gold"></div>
        <a href="{{ route('order.index') }}" class="btn btn-outline">← Kembali</a>
    </div>
</div>

@endsection
