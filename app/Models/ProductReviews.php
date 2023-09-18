<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReviews extends Model
{
    use HasFactory;

    protected $table = 'product_reviews';

    protected $fillable = ['id', 'product_id', 'user_id', 'rate', 'content', 'status', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE_LABEL = "Active";
    const STATUS_INACTIVE_LABEL = "InActive";

    public function getStatusLabel(): string
    {
        switch ($this->status) {
            case static::STATUS_ACTIVE:
                return static::STATUS_ACTIVE_LABEL;
            case static::STATUS_INACTIVE:
                return static::STATUS_INACTIVE_LABEL;

            default:
                return "N/A";
        }
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
