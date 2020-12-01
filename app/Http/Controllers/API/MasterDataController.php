<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function getDistricts()
    {
        $districts = District::select('districts.id','districts.district_name')->get();
        return $districts;
    }
}
