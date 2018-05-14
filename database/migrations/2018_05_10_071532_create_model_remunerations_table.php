<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelRemunerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ng_remunerations', function (Blueprint $table) {
            $table->increments('rem_id');
            $table->string('rem_name');
            $table->string('rem_description');
            $table->integer('rem_type_id');
            $table->integer('active_flag');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ng_remunerations');
    }
}
