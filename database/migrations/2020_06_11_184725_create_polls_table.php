<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->boolean('status')->default(0)->comment('1=>approved, 0=>unapproved');
            $table->dateTime('start_date');
            $table->dateTime('end_date');

            // Counts
            $table->unsignedBigInteger('total_yes')->default(0);
            $table->unsignedBigInteger('total_no')->default(0);
            $table->unsignedBigInteger('total_no_comment')->default(0);
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
        Schema::dropIfExists('polls');
    }
}
