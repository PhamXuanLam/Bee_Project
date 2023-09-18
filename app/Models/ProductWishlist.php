<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWishlist extends Model
{
    use HasFactory;

    protected $table = 'product_wishlist';

    protected $fillable = ['id', 'product_id', 'user_id'];

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }
}
