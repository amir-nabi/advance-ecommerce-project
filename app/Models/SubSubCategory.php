<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'subcategory_id',
        'subsubcategory_name_eng',
        'subsubcategory_name_ar',
        'subsubcategory_slug_eng',
        'subsubcategory_slug_ar',
    ];

    public function category(){
    	return $this->belongsTo(Category::class,'cat_id','id');
    }


		public function subcategory(){
    	return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }

}
