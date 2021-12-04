<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = [
        'id',
        'title',
        'story',
        'links',
        'x',
        'y',
        'star_index',
        'area',
        'shape'
    ];

    protected $casts = [
        'links' => 'array'
    ];
}
