<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained('suppliers')->cascadeOnDelete();
            $table->string('value');
            $table->string('reciever_name')->nullable();
            $table->string('photo')->nullable();
            $table->string('notes')->nullable();
            $table->string('transfer_number')->nullable();
            $table->string('cheque_number')->nullable();
            $table->enum('receipt_type',['out','in'])->default('out');
            $table->enum('payment_type',['cash','visa','bank_transfer','cheque'])->default('cash');
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
        Schema::dropIfExists('receipts');
    }
}
