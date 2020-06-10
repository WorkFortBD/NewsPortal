<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Track;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use App\Models\BrandCategory;
use App\Helpers\UploadHelper;
use App\Helpers\StringHelper;
use App\Models\BrandImage;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use DB;

class BrandController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('brand.view')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        if (request()->ajax()) {
            $brands = Brand::leftjoin('brand_categories', 'brands.brand_category_id', '=', 'brand_categories.id')
                ->orderBy('id', 'desc')
                ->select(
                    'brands.id as id',
                    'brands.title as title',
                    'brands.slug as slug',
                    'brand_categories.title as cTitle',
                    'brands.image as image',
                    'ingredients',
                    'nutritions',

                )
                ->get();

            // dd($pages);
            $datatable = Datatables::of($brands)
                ->addColumn(
                    'action',
                    function ($row) {
                        $csrf = "" . csrf_field() . "";
                        $html = '<div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="' . route('admin.brands.edit', $row->id) . '">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <a class="dropdown-item" href="#deleteModal' . $row->id . '"
                                    data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
                                </div>
                            </div> 
                            <div class="modal fade delete-modal" id=deleteModal' . $row->id . '  tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        contact all informations (contact profile and contacts) will be deleted. Please
                                        be sure
                                        first to delete.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <form action="' . action('Backend\BrandController@destroy', [$row->id]) . '" method="post">' . $csrf . '
                                        <button type="submit" class="btn btn-outline-success"><i
                                                class="fa fa-check"></i> Confirm Delete</button>
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> ';
                        return $html;
                    }
                )
                ->editColumn('image', function ($row) {
                    $url = url("public/assets/backend/images/brand/" . $row->image);
                    return '<a class="dropdown-item" href="#showImageModal' . $row->id . '" data-toggle="modal"><img class="report-min-img" src="' . $url . '"></a>

                      <div class="modal fade delete-modal" id="showImageModal' . $row->id . '" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">' . $row->title . '-Image</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="modal-max-img" src="' . $url . '">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                })

                ->editColumn('ingredients', function ($row) {
                    return $row->ingredients;
                })

                ->editColumn('nutritions', function ($row) {
                    return $row->nutritions;
                });
            $rawColumns = ['action', 'image', 'ingredients', 'nutritions'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }


        return view('backend.pages.brands.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('brand.view')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $bCategory = BrandCategory::orderBy('id', 'desc')->get();

        return view('backend.pages.brands.create', compact('bCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('brand.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $request->validate([
            'title'  => 'required|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {
            DB::beginTransaction();
            $brand = new Brand();
            $brand->title = $request->title;
            if (is_null($request->slug)) {
                $brand->slug = StringHelper::createSlug($request->title, 'Page', 'slug', '');
            } else {
                $brand->slug = $request->slug;
            }
            $brand->brand_category_id = $request->brand_category_id;

            if ($request->image) {
                $brand->image = UploadHelper::upload('image', $request->image, $request->title . '-' . time(), 'public/assets/backend/images/brand');
            }

            $brand->ingredients = $request->ingredients;
            $brand->nutritions = $request->nutritions;
            $brand->description = $request->description;
            $brand->buy_link = $request->buy_link;
            $brand->is_ecommerce = $request->is_ecommerce;
            $brand->created_at = Carbon::now();
            $brand->updated_at = Carbon::now();
            $brand->save();


            // Upload multiple image
            if ($request->images) {
                $i = 1;
                foreach ($request->images as $image) {
                    $imagePath = UploadHelper::upload('image', $image, $brand->id . '-' . $i . '-' . time(), 'public/assets/backend/images/brand');
                    $brandImage = new BrandImage();
                    $brandImage->brand_id = $brand->id;
                    $brandImage->image = $imagePath;
                    $brandImage->image_caption = $request->title;
                    $brandImage->save();
                    $i++;
                }
            }

            Track::newTrack($request->title, 'New brand created');

            DB::commit();
            session()->flash('success', 'New Brand has been saved successfully !!');

            return redirect()->route('admin.brands.index');
        } catch (\Exception $e) {
            // session()->flash('db_error', 'Error On: '."File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('brand.edit')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $bCategory = BrandCategory::orderBy('id', 'desc')->get();
        $brand_images = BrandImage::orderBy('id', 'desc')
            ->where('brand_id', $id)
            ->get();
        $brands = Brand::find($id);

        return view('backend.pages.brands.edit', compact('bCategory', 'brands', 'brand_images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if (is_null($this->user) || !$this->user->can('brand.edit')) {
            return abort(403, 'You are not allowed to access this page !');
        }



        $request->validate([
            'title'  => 'required|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {
            DB::beginTransaction();
            $brand = Brand::find($id);
            if (is_null($brand)) {
                return redirect()->name('admin.brands.index');
            }

            $brand->title = $request->title;
            if (is_null($request->slug)) {
                $brand->slug = StringHelper::createSlug($request->title, 'Page', 'slug', '');
            } else {
                $brand->slug = $request->slug;
            }
            $brand->brand_category_id = $request->brand_category_id;
            if ($request->image) {
                $brand->image = UploadHelper::update('image', $request->image, $request->title . '-' . time(), 'public/assets/backend/images/brand', $brand->image);
            }

            $brand->ingredients = $request->ingredients;
            $brand->nutritions = $request->nutritions;
            $brand->description = $request->description;
            $brand->buy_link = $request->buy_link;
            $brand->is_ecommerce = $request->is_ecommerce;
            $brand->created_at = Carbon::now();
            $brand->updated_at = Carbon::now();
            $brand->save();

            // Upload multiple image
            if ($request->images) {
                $i = 1;
                foreach ($request->images as $image) {
                    $imagePath = UploadHelper::update('image', $image, $brand->id . '-' . $i . '-' . time(), 'public/assets/backend/images/brand', $brand->image);
                    $brandImage = new BrandImage();
                    $brandImage->brand_id = $brand->id;
                    $brandImage->image = $imagePath;
                    $brandImage->image_caption = $request->title;
                    $brandImage->save();
                    $i++;
                }
            }

            Track::newTrack($request->title, 'Brand updated');

            DB::commit();
            session()->flash('success', 'Brand has been updated successfully !!');

            return redirect()->route('admin.brands.index');
        } catch (\Exception $e) {
            // session()->flash('db_error', 'Error On: '."File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('brand.delete')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $brand = Brand::find($id);
        $message = "Brand Not found !!";
        $messageType = "error";
        if (!is_null($brand)) {

            // Delete brand Images
            DB::table('brand_images')->where('brand_id', $id)->delete();

            $brand->delete();
            $message = 'Brand Information has been deleted successfully !';
            $messageType = "success";
            session()->flash($messageType, $message);
        } else {
            session()->flash('error', 'Something went wrong');
        }

        return back();
    }


    /**
     * Brand Images Delete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageDelete($id)
    {
        // if (is_null($this->user) || !$this->user->can('brand.delete')) {
        //     return abort(403, 'You are not allowed to access this page !');
        // }

        $brand_image = BrandImage::find($id);
        $message = "Brand Image Not found !!";
        $messageType = "error";
        if (!is_null($brand_image)) {


            $brand_image->delete();
            $message = 'Image has been deleted successfully !';
            $messageType = "success";
            session()->flash($messageType, $message);
        } else {
            session()->flash($messageType, $message);
        }



        return back();
    }
}
