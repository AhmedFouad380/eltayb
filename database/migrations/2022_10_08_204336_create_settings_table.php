<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('logo')->nullable();
            $table->text('about')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('customer_phone')->nullable();
            $table->text('email')->nullable();
            $table->text('hours')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('instagram')->nullable();
            $table->text('youtube')->nullable();
            $table->integer('delivery_fees')->nullable();
            $table->integer('tax')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
