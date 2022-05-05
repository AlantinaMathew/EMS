<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_donor', function (Blueprint $table) {
            $table->id();
            $table->integer('uid');
            $table->date('dob');
            $table->string('medlyf',8);
            $table->integer('weight');
            $table->string('gender',10);
            
            $table->string('donor',8);
            $table->string('bloodgrp',30);
            $table->integer('status');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_donor');
    }
};
