<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->bigInteger('country_id')->unsigned()
                ->nullable();
            $table->bigInteger('city_id')->unsigned()
                ->nullable();
            $table->string('name', 100);
            $table->string('razon_social', 100)->unique();
            $table->string('rfc_rut_cuit', 50);
            $table->string('address', 100);
            $table->string('postal_code', 10);
            $table->string('phone', 100);
            $table->string('email', 100);
            $table->string('pin', 10);
            $table->string('pin_confirmation', 10);
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('users');
            $table->integer('no_cuenta')->default(0)->nullable();
            $table->integer('cedula_fiscal')->default(0)->nullable();
            $table->integer('bps')->default(0)->nullable();
            $table->integer('dgi')->default(0)->nullable();

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
