<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager;

class Create_user_table
{

	public function up()
	{
		Manager::schema()->create('users', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('username')->unique();
			$table->timestamps();
		});
	}
	public function down()
	{
		Manager::schema()->dropIfExists('users');
	}
}
