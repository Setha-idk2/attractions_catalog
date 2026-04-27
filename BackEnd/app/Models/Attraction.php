<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'coordinate',
        'img_path',
        'category_id',
    ];

    protected $casts = [
        'coordinate' => 'string',
        'img_path' => 'string',
        'category_id' => 'integer',
    ];

    protected $appends = ['img_url'];

    public function getImgUrlAttribute()
    {
        if (!$this->img_path) {
            return null;
        }

        // Return full URL using asset helper
        return asset('storage/' . $this->img_path);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
