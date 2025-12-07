<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaImage extends Model
{
    use HasFactory;

    public $timestamps = false; // karena kita cuma pakai created_at

    protected $fillable = [
        'villa_id',
        'image_path',
        'created_at',
    ];

    /**
     * Relasi: gambar milik satu villa.
     */
    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }
}
