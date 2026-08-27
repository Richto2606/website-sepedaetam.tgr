<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'status',
        'price_1h',
        'price_2h',
        'price_1day',
        'photo_path',
    ];
}
