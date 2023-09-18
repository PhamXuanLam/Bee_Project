<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $fillable = ['id', 'product_id', 'name', 'path', 'status', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;
}
