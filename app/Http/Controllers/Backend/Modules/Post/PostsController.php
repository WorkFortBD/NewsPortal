<?php

namespace App\Http\Controllers\Backend\Modules\Post;

use App\Helpers\StringHelper;
use app\Helpers\SummernoteImageHelper;
use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostCreateRequest;
use App\Models\Category;
use App\Models\Track;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PostsController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($isTrashed = false)
    {
        if (is_null($this->user) || !$this->user->can('post.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            if ($isTrashed) {
                $posts = Post::orderBy('id', 'desc')
                    ->where('status', 0)
                    ->get();
            } else {
                $posts = Post::orderBy('id', 'desc')
                    ->where('deleted_at', null)
                    ->where('status', 1)
                    ->get();
            }

            $datatable = DataTables::of($posts, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Page Details" href="' . route('admin.posts.show', $row->id) . '"><i class="fa fa-eye"></i></a>';

                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.posts.destroy', [$row->id]);
                            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 " title="Edit Page Details" href="' . route('admin.posts.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        } else {
                            $deleteRoute =  route('admin.posts.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.posts.trashed.revert', [$row->id]);

                            $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                            $html .= '
                            <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Revert</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Page Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }



                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Page will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Page will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Page will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
                                }).then((result) => { if (result.value) {$("#revertForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '
                            <form id="deleteForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';

                        $html .= '
                            <form id="deletePermanentForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Permanent Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                        return $html;
                    }
                )

                ->editColumn('title', function ($row) {
                    return $row->title . ' <br /><a href="' . route('admin.posts.show', $row->id) . '" target="_blank"><i class="fa fa-link"></i> View</a>';
                })
                ->editColumn('featured_image', function ($row) {
                    if ($row->featured_image != null) {
                        return "<img src='" . asset('public/assets/images/posts/' . $row->featured_image) . "' class='img img-display-list' />";
                    }
                    return '-';
                })
                ->editColumn('image', function ($row) {
                    if ($row->image != null) {
                        return "<img src='" . asset('public/assets/images/posts/' . $row->image) . "' class='img img-display-list' />";
                    }
                    return '-';
                })
                ->addColumn('category', function ($row) {
                    $html = "";
                    $category = Category::find($row->category_id);
                    if (!is_null($category)) {
                        $html .= "<span>" . $category->name . "</span>";
                    } else {
                        $html .= "-";
                    }
                    return $html;
                })
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge badge-success font-weight-100">Active</span>';
                    } else if ($row->deleted_at != null) {
                        return '<span class="badge badge-danger">Trashed</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                });
            $rawColumns = ['action', 'title', 'status', 'category', 'featured_image', 'image'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_pages = count(Post::select('id')->get());
        $count_active_pages = count(Post::select('id')->where('status', 1)->get());
        $count_trashed_pages = count(Post::select('id')->where('deleted_at', '!=', null)->get());
        return view('backend.pages.posts.index', compact('count_pages', 'count_active_pages', 'count_trashed_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::printCategory();
        return view('backend.pages.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('post.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        // $request->validate([
        //     'title'  => 'required|max:100',
        //     'slug'  => 'nullable|max:100|unique:posts,slug',
        //     'featured_image'  => 'nullable|image'
        // ]);

        try {
            DB::beginTransaction();
            $post = new Post();
            $post->title = $request->title;
            if ($request->slug) {
                $post->slug = $request->slug;
            } else {
                $post->slug = StringHelper::createSlug($request->title, 'Post', 'slug', '');
            }

            if (!is_null($request->featured_image)) {
                $post->featured_image = UploadHelper::upload('featured_image', $request->featured_image, $request->title . '-' . time() . '-featured_images', 'public/assets/images/posts');
            }





            $post->category_id = $request->category_id;
            $post->status = $request->status;
            $post->short_description = $request->short_description;
            $post->description = $request->description;
            $post->featured_image_caption = $request->featured_image_caption;
            $post->meta_description = $request->meta_description;
            $post->created_at = Carbon::now();
            $post->created_by = Auth::guard('admin')->id();
            $post->updated_at = Carbon::now();
            $post->save();
            Track::newTrack($post->title, 'New Post has been created');
            DB::commit();
            session()->flash('success', 'New Post has been created successfully !!');
            return redirect()->route('admin.posts.index');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
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

        if (is_null($this->user) || !$this->user->can('post.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $post = Post::find($id);
        $categories = DB::table('categories')->select('id', 'name')->get();
        return view('backend.pages.posts.show', compact('categories', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('page.edit')) {
        //     $message = 'You are not allowed to access this page !';
        //     return view('errors.403', compact('message'));
        // }
        $post = Post::find($id);
        $categories = Category::printCategory($post->category_id);
        return view('backend.pages.posts.edit', compact('categories', 'post'));
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
        // if (is_null($this->user) || !$this->user->can('page.edit')) {
        //     $message = 'You are not allowed to access this page !';
        //     return view('errors.403', compact('message'));
        // }

        $post = Post::find($id);
        if (is_null($post)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.posts.index');
        }

        $request->validate([
            'title'  => 'required|max:100',
            'slug'  => 'required|max:100|unique:posts,slug,' . $post->id,
        ]);

        try {
            DB::beginTransaction();
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->status = $request->status;

            if (!is_null($request->featured_image)) {
                $post->featured_image = UploadHelper::upload('featured_image', $request->featured_image, $request->title . '-' . time() . '-featured_images', 'public/assets/images/posts');
            }




            $post->category_id = $request->category_id;
            $post->status = $request->status;
            $post->short_description = $request->short_description;
            $post->featured_image_caption = $request->featured_image_caption;
            $post->meta_description = $request->meta_description;
            $post->updated_by = Auth::guard('admin')->id();
            $post->updated_at = Carbon::now();
            $post->save();


            Track::newTrack($post->title, 'post has been updated successfully !!');
            DB::commit();
            session()->flash('success', 'post has been updated successfully !!');
            return redirect()->route('admin.posts.index');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
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
        // if (is_null($this->user) || !$this->user->can('page.delete')) {
        //     $message = 'You are not allowed to access this page !';
        //     return view('errors.403', compact('message'));
        // }

        $post = Post::find($id);
        if (is_null($post)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.posts.trashed');
        }
        $post->deleted_at = Carbon::now();
        $post->deleted_by = Auth::guard('admin')->id();
        $post->status = 0;
        $post->save();

        session()->flash('success', 'Page has been deleted successfully as trashed !!');
        return redirect()->route('admin.posts.trashed');
    }

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {
        // if (is_null($this->user) || !$this->user->can('page.delete')) {
        //     $message = 'You are not allowed to access this page !';
        //     return view('errors.403', compact('message'));
        // }

        $post = Post::find($id);
        if (is_null($post)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.posts.trashed');
        }
        $post->deleted_at = null;
        $post->deleted_by = null;
        $post->save();

        session()->flash('success', 'Page has been revert back successfully !!');
        return redirect()->route('admin.posts.trashed');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        // if (is_null($this->user) || !$this->user->can('page.delete')) {
        //     $message = 'You are not allowed to access this page !';
        //     return view('errors.403', compact('message'));
        // }
        $post = Post::find($id);
        if (is_null($post)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.posts.trashed');
        }

        // Remove Images
        UploadHelper::deleteFile('public/assets/images/posts/' .  $post->featured_image);

        // Delete Page permanently
        $post->delete();

        session()->flash('success', 'Page has been deleted permanently !!');
        return redirect()->route('admin.posts.trashed');
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        // if (is_null($this->user) || !$this->user->can('page.view')) {
        //     $message = 'You are not allowed to access this page !';
        //     return view('errors.403', compact('message'));
        // }
        return $this->index(true);
    }
}
