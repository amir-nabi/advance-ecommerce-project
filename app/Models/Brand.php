<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_name_eng',
        'brand_name_fr',
        'brand_slug_eng',
        'brand_slug_fr',
        'brand_image',
    ];
}
