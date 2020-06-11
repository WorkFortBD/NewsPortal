<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->index();
            $table->text('short_description')->nullable();
            $table->text('description');

            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            $table->string('featured_image')->nullable();
            $table->string('featured_image_caption')->nullable();

            $table->unsignedBigInteger('category_id');
            $table->boolean('status')->default(1)->comment('1=>active, 0=>inactive');
            $table->softDeletes('deleted_at', 0);

            $table->unsignedBigInteger('total_view')->index()->default(0);
            $table->unsignedBigInteger('total_search')->index()->default(0);
            $table->unsignedBigInteger('total_liked')->index()->default(0);
            $table->unsignedBigInteger('total_disliked')->index()->default(0);
            $table->unsignedBigInteger('total_comment')->index()->default(0);
            $table->unsignedBigInteger('total_reaction')->default(0)->comment('total reaction count');

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
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('posts');
    }
}
