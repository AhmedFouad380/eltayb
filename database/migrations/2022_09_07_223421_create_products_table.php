<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title');
            $table->string('en_title');
            $table->longText('ar_description')->nullable();
            $table->longText('en_description')->nullable();
            $table->enum('is_active',['active','inactive'])->default('inactive');
            $table->string('image')->nullable();
            $table->enum('is_discount',['active','inactive'])->default('inactive');
            $table->integer('discount_value')->default(0);
            $table->integer('in_stock')->default(0);
            $table->integer('is_new')->default(0);
            $table->integer('is_hot')->default(0);
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
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
        Schema::dropIfExists('products');
    }
}
