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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('invoice_id');
            $table->foreignId('customer_id')->constrained('users');
            $table->foreignId('shipping_id')->constrained('shippings');
            $table->foreignId('payment_id')->constrained('payments');
            $table->string('subtotal');
            $table->string('total');
            $table->string('discount')->nullable();
            $table->enum('status', ['complete','process','pending','cancel'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
};
