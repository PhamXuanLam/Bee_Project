<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

    protected $fillable = ['id', 'full_name', 'email', 'subject', 'content', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;
}
