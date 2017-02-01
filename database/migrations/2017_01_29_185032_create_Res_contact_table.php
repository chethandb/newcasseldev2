<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_contact', function (Blueprint $table) {
            $table->increments('con_id');
            $table->string('con_fname');
            $table->string('con_mname');
            $table->string('con_lname');
            $table->string('con_relationship');
            $table->string('con_cellphone');
            $table->string('con_email');
            $table->string('con_comment');
            $table->string('con_gender');
            $table->integer('user_id')->unsigned();
        });

        Schema::table('res_contact', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('res_contact');
    }
}