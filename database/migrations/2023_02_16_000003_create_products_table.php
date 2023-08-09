<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('subcategory_id')->nullable()->constrained('subcategories');
            $table->foreignId('manufacture_id')->nullable()->constrained('manufactures');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('SKU')->unique();
            $table->string('image')->nullable();
            $table->string('short_description');
            $table->longText('long_description');
            $table->string('regular_price');
            $table->string('discount_price')->nullable();
            $table->boolean('status')->default(true);
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
};
