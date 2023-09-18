<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = ['id', 'order_id', 'product_id', 'qty', 'price', 'total', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }

    public function order()
    {
        return $this->hasOne(Orders::class, 'id', 'order_id');
    }
}
