<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['id', 'user_id', 'status', 'total', 'tax', 'discount', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_ACTIVE_LABEL = "Active";
    const STATUS_INACTIVE_LABEL = "InActive";

    public function getStatusLabel()
    {

        switch ($this->status) {
            case static::STATUS_ACTIVE:
                return static::STATUS_ACTIVE_LABEL;
            case static::STATUS_INACTIVE:
                return static::STATUS_INACTIVE_LABEL;
        }
    }

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function orderItems() {
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }

    public function products()
    {
        return $this->hasManyThrough(Products::class, OrderItems::class, 'order_id', 'id', 'id', 'product_id' );
    }
}
