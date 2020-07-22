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
        $topNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Top News')
            ->where('posts.status', 1)
            ->first();

        $featureNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Featured')
            ->where('posts.status', 1)
            ->get();

        $entertainmentNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Fashion')
            ->where('posts.status', 1)
            ->get();

        $sportsNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Sports')
            ->where('posts.status', 1)
            ->get();

        $noaparaNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Noapara')
            ->where('posts.status', 1)
            ->get();

        $economicNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Economic')
            ->where('posts.status', 1)
            ->get();

        $lifeNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Life')
            ->where('posts.status', 1)
            ->get();

        $scienceNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Science')
            ->where('posts.status', 1)
            ->get();

        $bangladeshNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Bangladesh')
            ->where('posts.status', 1)
            ->get();

        return view('frontend.pages.index', compact('topNews', 'featureNews', 'entertainmentNews', 'sportsNews', 'noaparaNews', 'economicNews', 'lifeNews', 'scienceNews', 'bangladeshNews'));
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

        $allNews = Post::where('status', 1)->get();

        return view('frontend.pages.single-article', compact('singleNews', 'allNews'));
    }
}
