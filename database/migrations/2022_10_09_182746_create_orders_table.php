<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_num');
            $table->double('total_price')->default(0);
            $table->enum('type',['pending','preparing','on_way','delivered','canceled'])->default('pending');
            $table->enum('payment_type',['cash','credit'])->default('cash');
            $table->integer('is_payed')->default(0);
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('address_id')->nullable()->constrained('addresses')->nullOnDelete();
            $table->longText('note')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('delivery_fees')->nullable();
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->nullOnDelete();
            $table->integer('coupon_percent')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
