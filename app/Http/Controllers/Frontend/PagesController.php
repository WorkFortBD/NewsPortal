<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
{
    /**
     * homePage
     *
     * HomePage of Application
     * 
     * @return void
     */
    public function homePage()
    {
        $featureNews = Post::select('posts.id as id', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Featured')
            ->where('posts.status', 1)
            ->get();

        $entertainmentNews = Post::join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Fashion')
            ->where('posts.status', 1)
            ->get();

        $sportsNews = Post::join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Sports')
            ->where('posts.status', 1)
            ->get();

        $topNews = Post::join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Top News')
            ->where('posts.status', 1)
            ->first();

        return view('frontend.pages.index', compact('featureNews', 'entertainmentNews', 'sportsNews', 'topNews'));
    }

    /**
     * bangladeshNews
     *
     * Bangladesh News
     * 
     * @return void
     */
    public function bangladeshNews()
    {
        return view('frontend.pages.bangladesh');
    }

    /**
     * internationalNews
     *
     * International News
     * 
     * @return void
     */
    public function internationalNews()
    {
        return view('frontend.pages.international');
    }

    /**
     * singleNews
     *
     * Single News
     * 
     * @return void
     */
    public function singleNews($slug)
    {
        $singleNews = Post::where('slug', $slug)
            ->first();

        return view('frontend.pages.single-article', compact('singleNews'));
    }
}
