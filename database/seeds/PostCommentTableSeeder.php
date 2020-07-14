<?php

use App\Models\PostComment;
use Illuminate\Database\Seeder;

class PostCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog = new PostComment();
        $blog->comment = "<div>Welcome to our Comment Section <br /></div>";
        $blog->is_identity_visible = 1;
        $blog->status = 1;
        $blog->total_reaction = 100;
        $blog->save();

        $blog = new PostComment();
        $blog->comment = "<div>Welcome to our Comment Section <br /></div>";
        $blog->is_identity_visible = 1;
        $blog->status = 1;
        $blog->total_reaction = 100;
        $blog->save();
    }
}
