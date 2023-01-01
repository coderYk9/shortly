<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager;

class Create_user_table
{

    public function up()
    {
        Manager::schema()->create('urls', function (Blueprint $table) {
            $table->id();
            $table->string('full_url');
            $table->string('short_url')->unique();
            $table->foreignId('user_id')->constrained('users')->
            onDelete('cascade');
            $table->string('views');
            $table->timestamps();
        });
    }
    public function down()
    {
        Manager::schema()->dropIfExists('admins');
    }
}
