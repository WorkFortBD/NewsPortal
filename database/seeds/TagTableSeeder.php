<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog = new Tag();
        $blog->title = "This is a Tag from admin panel";
        $blog->slug = "this-is-a-tag-from-admin-panel";
        $blog->description = "<div>Welcome to our Tag <br /></div>";
        $blog->status = 1;
        $blog->total_reaction = 10;
        $blog->save();

        $blog = new Tag();
        $blog->title = "This is tag from admin panel";
        $blog->slug = "this-is-tag2-from-admin-panel";
        $blog->description = "<div>Welcome to our Tag <br /></div>";
        $blog->status = 1;
        $blog->total_reaction = 10;
        $blog->save();
    }
}
