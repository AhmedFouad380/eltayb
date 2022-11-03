<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->integer('num')->nullable();
            $table->enum('is_available',['active','inactive'])->default('active');
            $table->integer('available_quantity')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('sell_price')->default(0);
            $table->integer('purchase_price')->default(0);
            $table->date('date');
            $table->foreignId('product_id')->constrained('products')->restrictOnDelete();
            $table->foreignId('shape_id')->constrained('shapes')->restrictOnDelete();
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
        Schema::dropIfExists('storages');
    }
}
