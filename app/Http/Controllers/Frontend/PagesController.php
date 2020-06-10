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
}
