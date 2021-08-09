<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordCreatedByIdUpdatedByIdToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Add new column
            $table->string('password')->nullable();
            $table->unsignedBigInteger('created_by_id');
            $table->foreign('created_by_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['created_by_id']);
            $table->dropForeign(['updated_by_id']);

            // Drop the column
            $table->dropColumn('password');
            $table->dropColumn('created_by_id');
            $table->dropColumn('updated_by_id');
        });
    }
}
