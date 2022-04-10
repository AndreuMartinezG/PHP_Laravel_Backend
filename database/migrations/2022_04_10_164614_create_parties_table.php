<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('GameID');
            $table->foreign('GameID')
            ->references('id')
            ->on('games')
            ->unsigned()
            ->constrained('games')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedInteger('OwnerID');
            $table->foreign('OwnerID')
            ->references('id')
            ->on('users')
            ->unsigned()
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('parties');
    }
}
