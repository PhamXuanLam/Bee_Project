<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribes extends Model
{
    use HasFactory;

    protected $table = 'subscribes';

    protected $fillable = ['id', 'email', 'status', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_ACTIVE_LABEL = "Active";
    const STATUS_INACTIVE_LABEL = "InActive";

    public $timestamps = true;

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
}
