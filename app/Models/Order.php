<?php
// File: app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'table_number',
        'menu_id',
        'quantity',
        'total_price',
        'status',
        'note',
    ];

    // Relasi ke Menu (many to one)
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}

