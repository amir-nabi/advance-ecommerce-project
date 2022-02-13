<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('cat_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_eng');
            $table->string('product_name_ar');
            $table->string('product_slug_eng');
            $table->string('product_slug_ar');
            $table->string('product_code')->nullable();
            $table->string('product_qty');
            $table->string('product_tags_eng');
            $table->string('product_tags_ar');
            $table->string('product_size_eng')->nullable();
            $table->string('product_size_ar')->nullable();
            $table->string('product_color_eng');
            $table->string('product_color_ar');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_desc_eng');
            $table->string('short_desc_ar');
            $table->string('long_desc_eng')->nullable();
            $table->string('long_desc_ar')->nullable();
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_price')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
