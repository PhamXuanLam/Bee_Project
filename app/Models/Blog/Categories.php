<?php

namespace App\Models\Blog;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'p_categories';

    protected $fillable = ['id', 'name', 'slug', 'status', 'content', 'created_at', 'updated_at'];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
