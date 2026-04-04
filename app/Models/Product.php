<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'stock',
        'price',
        'description',
        'content',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'stock' => 'integer',
        'price' => 'decimal:2',
    ];
}
