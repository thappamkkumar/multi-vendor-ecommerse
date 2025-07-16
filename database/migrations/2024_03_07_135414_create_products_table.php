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
           
					 $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
           
					 $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          
						$table->text('name');
            $table->text('slug')->unique();
            $table->decimal('price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('delivery_charges', 10, 2)->default(0);
           // $table->decimal('gst', 10, 2)->nullable();
            $table->text('description')->nullable();
            $table->text('specification')->nullable();
            $table->integer('stock')->default(0);
            $table->text('video_url')->nullable();
            $table->json('images')->nullable();
            $table->text('thumnail')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('slug'); 
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
