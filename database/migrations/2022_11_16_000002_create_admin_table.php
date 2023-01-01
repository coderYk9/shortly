<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager;

class Create_user_table
{

    public function up()
    {
        Manager::schema()->create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }
    public function down()
    {
        Manager::schema()->dropIfExists('admins');
    }
}
