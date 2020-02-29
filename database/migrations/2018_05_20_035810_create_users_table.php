<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
 
            //peolhe dates
            $table->char('id_cpf', 11)->unique()->nullable();
            $table->string('name',50);
            $table->string('adress',11);
            $table->integer('cep');
            $table->double('lat');
            $table->double('lon');

            //auth date
            $table->string('email',80)->unique();
            $table->string('password',254)->nullable();

            //permission
            $table->string('permission')->default('app.user');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
				Schema::table('users', function(Blueprint $table) {
	});
		Schema::drop('users');
	}
}
