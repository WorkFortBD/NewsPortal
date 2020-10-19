<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post();
        $post->title = "Virus impact on economy worse than predicted IMF";
        $post->slug = "Virus-impact-on-economy-worse -than-predicted-IMF";
        $post->description = "<div>Welcome to our about us post <br /></div>";
        $post->featured_image = "public/assets/images/defaults/default-post.png";
        $post->category_id = 2;
        $post->save();

        $post = new Post();
        $post->title = "Beijing residents urged to stay home for public holiday";
        $post->slug = "Beijing-residents- urged- to- stay- home-for-public-holiday";
        $post->description = "<div>Welcome to our about us post <br /></div>";
        $post->featured_image = "public/assets/images/defaults/default-post.png";
        $post->category_id = 2;
        $post->save();
    }
}
