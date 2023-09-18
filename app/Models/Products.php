<?php

namespace App\Models;

use App\Models\Categories;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'products';

    protected $fillable = [
        'id', 'name', 'category_id', 'is_hot', 'rate_count', 'rate_point',
        'supplier_id', 'price', 'image',
        'status', 'slug', 'description',
        'content', 'created_at', 'updated_at'
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;

    public const DIRECTORY_PRODUCTS = "media/products";

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_ACTIVE_LABEL = "Active";
    const STATUS_INACTIVE_LABEL = "InActive";

    public const IS_HOT = 1;

    public const NOT_IS_HOT = 0;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getStatusLabel() : string
    {
        switch ($this->status) {
            case static::STATUS_ACTIVE:
                return static::STATUS_ACTIVE_LABEL;
            case static::STATUS_INACTIVE:
                return static::STATUS_INACTIVE_LABEL;

            default: return "N/A";
        }
    }

    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }
}
