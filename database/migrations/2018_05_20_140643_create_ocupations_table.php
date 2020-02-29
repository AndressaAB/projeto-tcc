<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcupationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocupations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_id_user')->unsined();
            $table->integer('ocupation');
            $table->string('description');
            
            $table->timestamps();
            $table->foreign('fk_id_user')->references('id_cpf')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ocupations', function (Blueprint $table) {
            $table->dropForeign('ocupations_fk_id_user_foreign');
        });
        Schema::dropIfExists('ocupations');
    }
}
