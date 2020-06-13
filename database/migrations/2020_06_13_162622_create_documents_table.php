<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('file')->comment('Full URL after (/) => public/images/test.png || full url of youtube/facebook');

            $table->enum('type', ['image', 'video', 'document', 'code'])
                ->default('image')
                ->index();
            $table->enum('link_type', ['local', 'external', 'embedded'])
                ->default('local')
                ->index();
            $table->file('extension')->index();

            // Meta Texts
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();

            // File Specific Data
            $table->float('width')->nullable();
            $table->float('height')->nullable();

            $table->float('size')
                ->default(0)
                ->nullable()
                ->comment('Size in KiloByte');

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
        Schema::dropIfExists('documents');
    }
}
