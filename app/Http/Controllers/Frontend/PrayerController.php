<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Prayer;
use Illuminate\Http\Request;

class PrayerController extends Controller
{
    public function showList($id){
        $prayers = Prayer::where('district_id',$id)->get();
        return $prayers;
    }
}
