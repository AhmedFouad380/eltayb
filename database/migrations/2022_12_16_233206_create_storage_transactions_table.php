<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorageTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['income','outcome']);
            $table->text('note');
            $table->integer('quantity')->default(0);
            $table->double('purchase_price')->default(0);
            $table->double('sell_price')->default(0);
            $table->foreignId('product_id')->constrained('products')->restrictOnDelete();
            $table->foreignId('shape_id')->constrained('shapes')->restrictOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->restrictOnDelete();
            $table->foreignId('invoice_id')->nullable()->constrained('invoices')->cascadeOnDelete();
            $table->foreignId('admin_id')->nullable()->constrained('admins')->restrictOnDelete();
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
        Schema::dropIfExists('storage_transactions');
    }
}
