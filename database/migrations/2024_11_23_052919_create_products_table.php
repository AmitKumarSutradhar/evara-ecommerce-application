<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('brand_id');
            $table->integer('unit_id');
            $table->string('name');
            $table->string('code');
            $table->text('short_description');
            $table->longText('long_description');
            $table->text('image');
            $table->double('regular_price',11, 2);
            $table->double('selling_price',11, 2);
            $table->integer('stock_amount')->default(0);
            $table->integer('hit_count')->default(0);
            $table->integer('sales_count')->default(0);
            $table->tinyInteger('featured_status')->default(1);
            $table->tinyInteger('satus')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
