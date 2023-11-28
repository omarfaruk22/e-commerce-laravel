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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('office_addres')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('operator_name')->nullable();
            $table->string('operator_phone')->nullable();
            $table->string('tin')->nullable()->comment('Taxpayer Identification');
            $table->string('trade_number')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 is Inactive,1 is active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
