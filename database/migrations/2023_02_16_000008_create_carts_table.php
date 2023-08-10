<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->foreignId('product_id')->constrained('products');
            $table->string('SKU');
            $table->integer('quantity');            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
