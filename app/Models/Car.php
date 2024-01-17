<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'doors',
        'luggage',
        'passengers',
        'price',
        'description',
        'image',
        'active',
        'category_id'
    ];
}
