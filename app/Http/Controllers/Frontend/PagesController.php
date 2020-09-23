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
            ->orderBy('posts.created_at', 'desc')
            ->first();

        $featureNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Featured')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->limit(12)
            ->get();

        $entertainmentNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Fashion')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->limit(20)
            ->get();

        $sportsNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Sports')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->limit(6)
            ->get();

        $noaparaNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Noapara')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->limit(20)
            ->get();

        $economicNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Economic')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->limit(4)
            ->get();

        $lifeNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Life')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->limit(4)
            ->get();

        $scienceNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Science')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->limit(4)
            ->get();

        $bangladeshNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Bangladesh')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->limit(20)
            ->get();

        $internationalNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'International')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->limit(20)
            ->get();

        return view('frontend.pages.index', compact('topNews', 'featureNews', 'entertainmentNews', 'sportsNews', 'noaparaNews', 'economicNews', 'lifeNews', 'scienceNews', 'bangladeshNews', 'internationalNews'));
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
        $bangladeshNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'posts.created_at as created_at', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Bangladesh')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $entertainmentNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Fashion')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('frontend.pages.bangladesh', compact('bangladeshNews', 'entertainmentNews'));
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
        $internationalNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'posts.created_at as created_at', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'International')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $entertainmentNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Fashion')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $bangladeshNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Bangladesh')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('frontend.pages.international', compact('internationalNews', 'entertainmentNews', 'bangladeshNews'));
    }

    /**
     * economicalNews
     *
     * Economic News
     * 
     * @return void
     */
    public function economicalNews()
    {
        $economicalNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'posts.created_at as created_at', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Economic')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $entertainmentNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Fashion')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $bangladeshNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Bangladesh')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('frontend.pages.economic', compact('economicalNews', 'entertainmentNews', 'bangladeshNews'));
    }

    /**
     * sportsNews
     *
     * Sports News
     * 
     * @return void
     */
    public function sportsNews()
    {
        $sportsNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'posts.created_at as created_at', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Sports')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $entertainmentNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Fashion')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $bangladeshNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Bangladesh')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('frontend.pages.sports', compact('sportsNews', 'entertainmentNews', 'bangladeshNews'));
    }

    /**
     * entertainmentNews
     *
     * Entertainment News
     * 
     * @return void
     */
    public function entertainmentNews()
    {
        $entertainmentNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'posts.created_at as created_at', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Fashion')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $bangladeshNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Bangladesh')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('frontend.pages.entertainment', compact('entertainmentNews', 'bangladeshNews'));
    }

    /**
     * akijCityNews
     *
     * Akij City News
     * 
     * @return void
     */
    public function akijCityNews()
    {
        $akijCityNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'posts.created_at as created_at', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Noapara')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $entertainmentNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Fashion')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $bangladeshNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Bangladesh')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('frontend.pages.akij-city', compact('akijCityNews', 'entertainmentNews', 'bangladeshNews'));
    }

    /**
     * allNews
     *
     * All News
     * 
     * @return void
     */
    public function allNews()
    {
        $allNews = Post::where('status', 1)->orderBy('posts.created_at', 'desc')->get();

        $entertainmentNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'posts.created_at as created_at', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Fashion')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $bangladeshNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Bangladesh')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('frontend.pages.all-news', compact('allNews', 'entertainmentNews', 'bangladeshNews'));
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

    /**
     * educationNews
     *
     * Education News
     * 
     * @return void
     */
    public function educationNews()
    {
        $educationNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'posts.created_at as created_at', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Education')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $entertainmentNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Fashion')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $bangladeshNews = Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Bangladesh')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('frontend.pages.education', compact('educationNews', 'entertainmentNews', 'bangladeshNews'));
    }
}
