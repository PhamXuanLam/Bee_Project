<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $apends = ["name"];

    protected $table = 'admin';

    protected $primaryKey = 'id';

    public $timestamps = 'true';

    protected $fillable = ['id', 'username', 'password', 'created_at', 'updated_at', 'remember_token'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    public function getNameAttribute()
    {
        return $this->username;
    }
}
