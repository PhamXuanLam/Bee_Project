<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'faqs';

    protected $fillable = ['id', 'name', 'slug', 'content', 'status', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
