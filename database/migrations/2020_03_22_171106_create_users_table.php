<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('country_id')->unsigned()
                ->nullable();
            $table->bigInteger('city_id')->unsigned()
                ->nullable();
            $table->bigInteger('profession_id')->unsigned()
                ->nullable();
            $table->bigInteger('sport_id')->unsigned()
                ->default(1);
            $table->bigInteger('sport_team_id')->unsigned()
                ->nullable();
            $table->bigInteger('sport_player_id')->unsigned()
                ->nullable();
            $table->bigInteger('membership_id')
                ->unsigned()->nullable();

            $table->string('name', 100);
            $table->string('lastname', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            $table->date('date_of_birth')->nullable();
            $table->boolean('gender')->nullable();
            $table->text('address')->nullable();
            $table->float('amount')->default(0);

            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();

            $table->json('access_token')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
