<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'categories';

    protected $fillable = ['id', 'name', 'slug', 'status', 'image', 'seq', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;

    const DIRECTORY_CATEGORIES = 'media/categories';
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_ACTIVE_LABEL = "Active";
    const STATUS_INACTIVE_LABEL = "InActive";
    const PriceRange = [
        'all' => 'Tất cả',
        '0-5' => 'Dưới 50K',
        '5-10' => 'Từ 50K đến 100K',
        '10-20' => 'Từ 100K đến 200K',
        '20-30' => 'Từ 200K đến 300K',
        '30-max' => 'Trên 300K',
    ];
    const KeyPrice = ['all', '0-5', '5-10', '10-20', '20-30', '30-max'];

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

    public static function categories(){
        return Categories::query()
        ->where('status',1)
        ->get();
    }
}
