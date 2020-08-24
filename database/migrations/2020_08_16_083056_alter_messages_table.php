<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->bigInteger('product_id')->nullable()->change();
            $table->bigInteger('buyer_id')->nullable()->change();

            $table->string('concept', 200)->nullable();
            $table->enum('type', ['e', 'n'])->default('n')->comment('e - express ; n - normal');
            $table->string('service_name')->nullable()->comment('solo type e');
            $table->float('amount')->nullable();
            $table->string('phone_contact', 70)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('concept');
            $table->dropColumn('type');
            $table->dropColumn('service_name');
            $table->dropColumn('amount');
            $table->dropColumn('phone_contact', 70);
        });
    }
}
