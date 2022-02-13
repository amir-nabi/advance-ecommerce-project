<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'subcat_name_eng',
            'subcat_name_ar',
            'subcat_slug_eng',
            'subcat_slug_ar',
        ];
}
