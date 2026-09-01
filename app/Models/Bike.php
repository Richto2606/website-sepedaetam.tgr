<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getPhotoUrlAttribute(): ?string
    {
        if (!$this->photo_path) {
            return null;
        }

        try {
            if (config('filesystems.default') !== 'local') {
                return Storage::disk(config('filesystems.default'))->url($this->photo_path);
            }

            return asset('storage/'.$this->photo_path);
        } catch (\Throwable $e) {
            return asset('storage/'.$this->photo_path);
        }
    }
}
