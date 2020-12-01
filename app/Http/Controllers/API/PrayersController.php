<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Prayer;
use Illuminate\Http\Request;

class PrayersController extends Controller
{
    public function getPrayerByDistrict($district_id)
    {
        $prayers = Prayer::where('district_id', $district_id)->get();
        return $prayers;
    }
}
