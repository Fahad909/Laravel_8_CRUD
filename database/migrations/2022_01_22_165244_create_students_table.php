<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->char('name',255);
            $table->char('roll',255);
            $table->char('registion',255);
            $table->char('depatment',255);
            $table->char('semester',255);
            $table->char('session',255);
            $table->char('phone',255);
            $table->char('email',255);
            $table->string('profile',255);
            $table->char('password',255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
