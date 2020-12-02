<?php

namespace App\Http\Controllers\Backend\Modules\Prayer;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Prayer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PrayerController extends Controller
{

    public function indexDistrict(){

        $districts = District::all();
        
        return view('backend.pages.prayer.category.index',compact('districts'));
    }
  
 
    public function createDistrict(){
        return view('backend.pages.prayer.category.create');
    }

    public function storeDistrict(Request $request){
        
        $this->validate($request,[
            'district_name'=>'required',
            'district_name_bn'=>'required',
            'division'=>'required' 
        ]);

        $store = new District();
        $store->district_name = $request->district_name;
        $store->district_name_bn = $request->district_name_bn;
        $store->division = $request->division;
        $store->save();

        return redirect()->route('admin.indexDistrict');
    }

    public function editDistrict($id){
        $district = District::find($id);

        return view('backend.pages.prayer.category.edit',compact('district'));
    }

    public function updateDistrict(Request $request,$id){
        $district = District::find($id);

        $district->district_name = $request->district_name;
        $district->district_name_bn = $request->district_name_bn;
        $district->division = $request->division;
        $district->update();

        return redirect()->route('admin.indexDistrict');
    }

    public function indexPrayer(){
        // $prayers = Prayer::all();
        $prayers = Prayer::select('prayers.*', 'districts.district_name')
        ->join('districts', 'districts.id', 'prayers.district_id')
        ->get();
        return view('backend.pages.prayer.prayer.index',compact('prayers'));
    }

    public function createPrayer(){
        $districts = District::all();

        return view('backend.pages.prayer.prayer.create',compact('districts'));
    }

    public function storePrayer(Request $request){
        
        $this->validate($request,[
            'prayer_name_en'=>'required',
            'prayer_name_bn'=>'required',
            'prayer_time_en'=>'required',
            'prayer_time_bn'=>'required',
            'district_id'=>'required'
        ]);

        $store = new Prayer();
        $store->prayer_name_en = $request->prayer_name_en;
        $store->prayer_name_bn = $request->prayer_name_bn;
        $store->prayer_time_en = $request->prayer_time_en;
        $store->prayer_time_bn = $request->prayer_time_bn;
        $store->prayer_date = $request->prayer_date;
        $store->district_id = $request->district_id;
        $store->save();

        return redirect()->route('admin.indexPrayer');
    }


    public function editPrayer($id){
        $prayer = Prayer::find($id);
        $districts = District::all();

        return view('backend.pages.prayer.prayer.edit',compact('prayer','districts'));
    }

    public function updatePrayer(Request $request,$id){

        $this->validate($request,[
            'prayer_name_en'=>'required',
            'prayer_name_bn'=>'required',
            'prayer_time_en'=>'required',
            'prayer_time_bn'=>'required',
            'district_id'=>'required'
        ]);

        $store = Prayer::find($id);
        $store->prayer_name_en = $request->prayer_name_en;
        $store->prayer_name_bn = $request->prayer_name_bn;
        $store->prayer_time_en = $request->prayer_time_en;
        $store->prayer_time_bn = $request->prayer_time_bn;
        $store->prayer_date = $request->prayer_date;
        $store->district_id = $request->district_id;
        $store->save();

        return redirect()->route('admin.indexPrayer');
    }

    

    
}
