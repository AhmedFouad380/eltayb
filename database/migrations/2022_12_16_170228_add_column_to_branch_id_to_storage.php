<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToBranchIdToStorage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branch_id_to_storage', function (Blueprint $table) {
            $table->foreignId('branch_id')->nullable()->constrained('clients')->cascadeOnDelete();
            $table->foreignId('client_id')->after('user_id')->nullable()->constrained('clients')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branch_id_to_storage', function (Blueprint $table) {
            //
        });
    }
}
