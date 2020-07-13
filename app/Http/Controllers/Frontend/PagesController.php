<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('frontend.pages.index');
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
    public function singleNews()
    {
        return view('frontend.pages.single-article');
    }
}
