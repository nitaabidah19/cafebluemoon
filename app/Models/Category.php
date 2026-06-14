<?php
// File: app/Models/Category.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon'];

    // Relasi ke Menu (one to many)
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
