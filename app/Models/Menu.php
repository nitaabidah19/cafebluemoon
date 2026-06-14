<?php
// File: app/Models/Menu.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'is_available',
    ];

    // Relasi ke Category (many to one)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke Order (one to many)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
