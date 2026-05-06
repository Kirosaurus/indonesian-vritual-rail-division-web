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
        Schema::create('products_payware', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('category');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        Schema::create('products_freeware', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('category');
            $table->boolean('active')->default(1);
            $table->string('tag1')->nullable();
            $table->string('tag2')->nullable();
            $table->string('tag3')->nullable();          
            $table->timestamps();
        }); 

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('products_freeware');
    }
};
