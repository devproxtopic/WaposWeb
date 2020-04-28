<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCedulaFieldBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->dropColumn('file_deculal');
            $table->string('cedula')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('businesses', function (Blueprint $table) {
            //
        });
    }
}
