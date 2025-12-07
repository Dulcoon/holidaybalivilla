<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'location',
        'address',
        'maps_link',
        'price_per_night',
        'bedrooms',
        'people',
        'bathrooms',
        'swimming_pool',
        'thumbnail',
        'status',
        'fasilitas',
    ];

    protected $casts = [
        'fasilitas' => 'array',
        'price_per_night' => 'decimal:2',
    ];

    /**
     * Relasi: satu villa punya banyak gambar.
     */
    public function images()
    {
        return $this->hasMany(VillaImage::class);
    }
}
