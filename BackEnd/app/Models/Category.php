<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
    ];

    public function attractions()
    {
        return $this->hasMany(Attraction::class);
    }
}
