<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'bike_id',
        'renter_name',
        'phone',
        'duration',
        'status_payment',
        'start_at',
        'total',
    ];

    protected function casts(): array
    {
        return [
            'start_at' => 'datetime',
            'total' => 'integer',
        ];
    }

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}
