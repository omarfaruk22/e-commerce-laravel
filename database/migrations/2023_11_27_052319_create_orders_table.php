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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('total_amount');
            $table->integer('discount')->default(0);
            $table->integer('delivery_charge')->default(0);
            $table->integer('total');
            $table->unsignedBigInteger('payment_id');
            $table->tinyInteger('status')->default(0)->comment('0 is Inactive, 1 is active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
