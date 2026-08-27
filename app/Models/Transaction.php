<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'category',
        'description',
        'amount',
        'occurred_at',
    ];

    protected function casts(): array
    {
        return [
            'occurred_at' => 'date',
            'amount' => 'integer',
        ];
    }
}
