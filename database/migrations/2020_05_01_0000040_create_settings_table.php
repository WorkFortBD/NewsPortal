<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default(config('app.name'));
            $table->string('site_logo')->default('logo.png');
            $table->string('site_favicon')->default('favicon.ico');

            $table->string('site_description')->nullable();
            $table->string('site_copyright_text')->nullable();

            // Meta
            $table->string('site_meta_description')->nullable();
            $table->string('site_meta_keywords')->nullable();
            $table->string('site_meta_author')->nullable();

            // Contacts
            $table->string('site_contact_no')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_working_day_hours')->nullable();

            // Social Links
            $table->string('site_facebook_link')->nullable();
            $table->string('site_youtube_link')->nullable();
            $table->string('site_twitter_link')->nullable();
            $table->string('site_linkedin_link')->nullable();

            // Extra Data (if Needed)
            $table->string('site_custom_data1')->nullable();
            $table->string('site_custom_data2')->nullable();
            $table->string('site_custom_data3')->nullable();
            $table->string('site_custom_data4')->nullable();

            // Extra Data (if Needed)
            $table->boolean('is_featured_image_enable')->default(1);
            $table->string('default_featured_image')->default('/public/assets/images/defaults/default-post.png');

            // Voting Colors
            $table->string('voting_yes_color')->default('#537d00');
            $table->string('voting_no_color')->default('#cc0000');
            $table->string('voting_no_comment_color')->default('#000000');

            // Slider
            $table->boolean('is_slider_enable')->default(true);
            $table->boolean('is_post_slider_enable')->default(true);

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')
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
        Schema::dropIfExists('settings');
    }
}
