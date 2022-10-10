<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title');
            $table->string('en_title');
            $table->integer('price');
            $table->integer('count')->default(1);
            $table->longText('note')->nullable();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->restrictOnDelete();
            $table->foreignId('product_id')->nullable()->constrained('products')->restrictOnDelete();
            $table->foreignId('shape_id')->nullable()->constrained('shapes')->restrictOnDelete();
            $table->string('ar_title_shape');
            $table->string('en_title_shape');
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
        Schema::dropIfExists('order_details');
    }
}
