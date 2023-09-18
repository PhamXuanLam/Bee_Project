<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComments extends Model
{
    use HasFactory;

    protected $table = 'product_comments';

    protected $fillable = ['id', 'product_id', 'user_id', 'content', 'status', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
