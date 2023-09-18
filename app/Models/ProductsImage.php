<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsImage extends Model
{
    public const DIRECTORY_PRODUCTS = "media/products";

   

    use HasFactory;

    protected $table = 'product_images';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'product_id', 'name', 'path', 'status'];

    public $timestamps = true;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
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
}
