<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoggingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loggings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_polisi')->nullable();
            $table->string('no_tid')->nullable();
            $table->uuid('uuid')->nullable();
            $table->string('major')->nullable();
            $table->string('minor')->nullable();
            $table->datetime('gate_in')->nullable();
            $table->datetime('gate_out')->nullable();
            $table->char('is_auth')->nullable();
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
        Schema::dropIfExists('loggings');
    }
}
