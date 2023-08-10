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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->enum('method',['Hand Cash','Bkash','Rocket','DBBL','Paypal'])->nullable();
            $table->bigInteger('trx_id')->nullable();
            $table->enum('status',['pending','paid','cancelled','failed','refunded','confirmed'])->default('pending');
            $table->dateTime('paid_at')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
