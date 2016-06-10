<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->text('name');
            $table->longText('content');
            $table->string('author', 100)->nullable();
            $table->text('subject')->nullable();
            $table->string('language', 30)->nullable();
            $table->string('category', 100)->default('default');

            //Clef étrangère
            $table->integer('user_id')->unsigned(); 

            $table->timestamps();
        });

        Schema::table('notes', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notes', function(Blueprint $table) {
            $table->dropForeign('notes_user_id_foreign');
        });

        Schema::drop('notes');
    }
}
