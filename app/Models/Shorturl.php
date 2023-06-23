<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shorturl extends Model
{
    use HasFactory;
    protected $fillable = [
        'short_url', 
        'short_origin', 
        'user_id'
    ];
}
