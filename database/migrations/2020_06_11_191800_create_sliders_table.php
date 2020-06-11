<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();

            $table->boolean('is_button_enable')
                ->default(1)
                ->comment('1=>enabled, 0=>disabled');
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->boolean('is_blank_redirect')->default(1);

            $table->boolean('is_description_enable')->default(1);
            $table->string('short_description')->nullable();

            $table->boolean('status')->default(1)->comment('1=>active, 0=>inactive');

            $table->softDeletes('deleted_at', 0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('created_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');
            $table->foreign('deleted_by')
                ->references('id')
                ->on('admins')
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
        Schema::dropIfExists('sliders');
    }
}
