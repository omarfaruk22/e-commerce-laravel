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
            $table->integer('vendor_id');
            $table->integer('cat_id');
            $table->integer('subcat_id');
            $table->string('product_name', 255);
            $table->string('slug');
            $table->string('product_code');
            $table->string('discount');
            $table->string('discount_price');
            $table->string('short_desc');
            $table->string('long_desc');
            $table->string('thumbnails')->nullable();
            $table->unsignedInteger('quantity'); // Assuming quantity is a numeric value
            $table->tinyInteger('status')->default(0)->comment('0 is Inactive,1 is active');
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
