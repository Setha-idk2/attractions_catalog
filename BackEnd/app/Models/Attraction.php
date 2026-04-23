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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
