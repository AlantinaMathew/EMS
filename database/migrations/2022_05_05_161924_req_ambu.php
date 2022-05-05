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
        Schema::create('tbl_req_ambu', function (Blueprint $table) {
            $table->id();
            
           // $table->integer('phone');
            $table->integer('uid');
            $table->integer('aid');
            $table->integer('location');
            $table->timestamps();
            $table->string('status');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
