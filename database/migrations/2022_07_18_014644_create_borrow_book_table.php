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
        Schema::create('borrow_book', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('book_id');//=> book_id bigint(20)
            $table->foreign('book_id')->references('id')->on('books');

            $table->unsignedBigInteger('student_id');//=> student_id bigint(20)
            $table->foreign('student_id')->references('id')->on('students');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_book');
    }
};
