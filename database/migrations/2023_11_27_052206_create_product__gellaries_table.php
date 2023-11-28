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
        Schema::create('product__gellaries', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');
            $table->string('images');
            $table->tinyInteger('status')->default(0)->comment('0 is Inactive,1 is active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product__gellaries');
    }
};
