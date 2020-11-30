<?php

namespace App\Http\Controllers\Backend\Modules\WidgetCategory;

use App\Http\Controllers\Controller;
use App\Models\WidgetCategory;
use App\Models\WidgetPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class WidgetCategoryController extends Controller
{

    public function indexWidgetCategory(){

        $widgetCategories = WidgetCategory::all();
        return view('backend.pages.widget.category.index',compact('widgetCategories'));
    }
  
 
    public function createWidgetCategory(){
        return view('backend.pages.widget.category.create');
    }

    public function storeWidgetCategory(Request $request){
        
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required'   
        ]);

        $store = new WidgetCategory();
        $store->title = $request->title;
        $store->description = $request->description;
        $store->save();

        return redirect()->route('admin.createWidgetCategory');
    }

    public function editWidgetCategory($id){
        $widgetCategory = WidgetCategory::find($id);

        return view('backend.pages.widget.category.edit',compact('widgetCategory'));
    }

    public function updateWidgetCategory(Request $request,$id){
        $widgetCategory = WidgetCategory::find($id);

        $widgetCategory->title =  $request->title;
        $widgetCategory->description =  $request->description;
        $widgetCategory->update();

        return redirect()->route('admin.indexWidgetCategory');
    }

    public function createWidgetPost(){
        $categories = WidgetCategory::all();
        return view('backend.pages.widget.post.create',compact('categories'));
    }

    public function storeWidgetPost(Request $request){
        
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'widget_categorie_id'=>'required'   
        ]);

        $store = new WidgetPost();
        $store->title = $request->title;
        $store->author = $request->author;
        $store->description = $request->description;
        $store->widget_categorie_id = $request->widget_categorie_id;
        $store->save();

        return redirect()->route('admin.createWidgetPost');
    }

    

    
}
