<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(category::class, 'cat_id', 'id');
    }
    public function colors()
    {
        return $this->hasMany(color::class, 'product_id', 'id');
    }

    public function galleryImages()
    {
        return $this->hasMany(galleryImage::class, 'product_id', 'id');
    }
    public function sizes()
    {
        return $this->hasMany(size::class, 'product_id', 'id');
    }
    public function reviews()
    {
        return $this->hasMany(review::class, 'product_id', 'id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
}
