<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const DIRECTORY_AVATAR = 'media/users';

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_ACTIVE_LABEL = "Active";
    const STATUS_INACTIVE_LABEL = "InActive";

    const SEX_MALE = 1;
    const SEX_FEMALE = 2;
    const SEX_MALE_LABEL = 'Nam';
    const SEX_FEMALE_LABEL = 'Nữ';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'name', 'phone_number', 'avatar', 'address',
        'username', 'first_name', 'last_name',
        'email', 'sex', 'last_login',
        'password', 'created_at', 'updated_at'
    ];

    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

    public function getSexLabel(): string
    {
        switch ($this->sex) {
            case static::SEX_MALE:
                return static::SEX_MALE_LABEL;
            case static::SEX_FEMALE:
                return static::SEX_FEMALE_LABEL;

            default:
                return "N/A";
        }
    }
}
