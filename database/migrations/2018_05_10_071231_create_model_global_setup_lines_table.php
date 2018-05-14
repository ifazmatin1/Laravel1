<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelGlobalSetupLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ng_global_setup_lines', function (Blueprint $table) {
            $table->increments('setup_line_id');
            $table->integer('global_setup_id');
            $table->string('setup_line_code',10)->nullable();
            $table->string('setup_line_name');
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
        Schema::dropIfExists('ng_global_setup_lines');
    }
}
