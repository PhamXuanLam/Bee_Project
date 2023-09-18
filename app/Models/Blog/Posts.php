<?php

namespace App\Models\Blog;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'p_posts';

    protected $fillable = [
        'id', 'category_id', 'name', 'slug',
        'image', 'description',
        'content', 'status', 'pushlished_at',
        'created_at', 'updated_at'
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_ACTIVE_LABEL = "Active";
    const STATUS_INACTIVE_LABEL = "InActive";

    const DIRECTORY_POSTS = "media/post";

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

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
