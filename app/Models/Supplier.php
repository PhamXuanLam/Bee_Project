<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = "supplier";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = ['id', 'name', 'address', 'email', 'phone_number', 'created_at', 'updated_at'];
}
