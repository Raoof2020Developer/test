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
            $table->string('ref');
            $table->string('designation');
            $table->string('image_path');
            $table->unsignedBigInteger('material_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->decimal('gram_buying_price');
            $table->decimal('gram_selling_price');
            $table->decimal('gram_weight');
            $table->decimal('max_discount');
            $table->unsignedInteger('quantity');
            $table->timestamps();

            $table->foreign('material_id')
                    ->references('id')
                    ->on('materials')
                    ->onDelete('set null');

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('set null');
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
