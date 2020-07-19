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
        $featureNews = Post::where('category_id', 4)
            ->where('status', 1)
            ->get();

        $entertainmentNews = Post::where('category_id', 2)
            ->where('status', 1)
            ->get();

        $sportsNews = Post::where('category_id', 5)
            ->where('status', 1)
            ->get();

        return view('frontend.pages.index', compact('featureNews', 'entertainmentNews', 'sportsNews'));
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
