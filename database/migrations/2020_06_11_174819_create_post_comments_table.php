<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('reply_comment_id')
                ->nullable()
                ->comment('It\'s the main commment');
            $table->text('comment');
            $table->boolean('is_identity_visible')->default(1);
            $table->string('ip_address')->nullable();
            $table->boolean('status')->default(0)->comment('1=>approved, 0=>unapproved');

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->unsignedBigInteger('total_reaction')->default(0);

            $table->foreign('updated_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');
            $table->foreign('deleted_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('reply_comment_id')
                ->references('id')
                ->on('post_comments')
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
        Schema::dropIfExists('post_comments');
    }
}
