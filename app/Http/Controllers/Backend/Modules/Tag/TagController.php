<?php

namespace App\Http\Controllers\Backend\Modules\Tag;

use App\Helpers\StringHelper;
use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\TagCreateRequests;
use App\Models\Tag;
use App\Models\Track;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TagController extends Controller
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
        if (is_null($this->user) || !$this->user->can('tag.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            if ($isTrashed) {
                $tags = Tag::orderBy('id', 'desc')
                    ->where('status', 0)
                    ->get();
            } else {
                $tags = Tag::orderBy('id', 'desc')
                    ->where('deleted_at', null)
                    ->where('status', 1)
                    ->get();
            }

            $datatable = DataTables::of($tags, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Tag Details" href="' . route('admin.tags.show', $row->id) . '"><i class="fa fa-eye"></i></a>';

                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.tags.destroy', [$row->id]);
                            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 " title="Edit Tag Details" href="' . route('admin.tags.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Tag" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        } else {
                            $deleteRoute =  route('admin.tags.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.tags.trashed.revert', [$row->id]);

                            $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                            $html .= '
                            <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Revert</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Blog Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }



                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Tag will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Tag will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Tag will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
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
                    return $row->title . ' <br /><a href="' . route('pages.show', $row->slug) . '" target="_blank"><i class="fa fa-link"></i> View</a>';
                })
                ->editColumn('image', function ($row) {
                    if ($row->image != null) {
                        return "<img src='" . asset('public/assets/images/tags/' . $row->image) . "' class='img img-display-list' />";
                    }
                    return '-';
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
            $rawColumns = ['action', 'title', 'status', 'image'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_tags = count(Tag::select('id')->get());
        $count_active_tags = count(Tag::select('id')->where('status', 1)->get());
        $count_trashed_tags = count(Tag::select('id')->where('deleted_at', '!=', null)->get());
        return view('backend.pages.tags.index', compact('count_tags', 'count_active_tags', 'count_trashed_tags'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('tag.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        return view('backend.pages.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagCreateRequests $request)
    {
        if (is_null($this->user) || !$this->user->can('tag.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        try {
            DB::beginTransaction();
            $tag = new Tag();
            $tag->title = $request->title;

            if ($request->slug) {
                $tag->slug = $request->slug;
            } else {
                $tag->slug = StringHelper::createSlug($request->title, 'Tag', 'slug', '');
            }

            if (!is_null($request->image)) {
                $tag->image = UploadHelper::upload('image', $request->image, $request->title . '-' . time() . '-logo', 'public/assets/images/tags');
            }

            if (!is_null($request->banner_image)) {
                $tag->banner_image = UploadHelper::upload('banner_image', $request->banner_image, $request->title . '-' . time() . '-logo', 'public/assets/images/tags');
            }

            $tag->status = $request->status;
            $tag->description = $request->description;
            $tag->meta_description = $request->meta_description;
            $tag->created_at = Carbon::now();
            $tag->created_by = Auth::guard('admin')->id();
            $tag->updated_at = Carbon::now();
            $tag->save();

            Track::newTrack($tag->title, 'New Tag has been created');
            DB::commit();
            session()->flash('success', 'New Tag has been created successfully !!');
            return redirect()->route('admin.tags.index');
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
        if (is_null($this->user) || !$this->user->can('tag.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $tag = Tag::find($id);
        return view('backend.pages.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('tag.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $tag = Tag::find($id);
        return view('backend.pages.tags.edit', compact('tag'));
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

        if (is_null($this->user) || !$this->user->can('tag.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $tag = Tag::find($id);
        if (is_null($tag)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.tags.index');
        }

        $request->validate([
            'title'  => 'required|max:100',
            'slug'  => 'required|max:100|unique:pages,slug,' . $tag->id,
        ]);

        try {
            DB::beginTransaction();
            $tag->title = $request->title;
            $tag->slug = $request->slug;
            $tag->status = $request->status;

            if (!is_null($request->image)) {
                $tag->image = UploadHelper::update('image', $request->image, $request->title . '-' . time() . '-logo', 'public/assets/images/tags', $tag->image);
            }


            if (!is_null($request->banner_image)) {
                $tag->banner_image = UploadHelper::update('banner_image', $request->banner_image, $request->title . '-' . time() . '-logo', 'public/assets/images/tags', $tag->banner_image);
            }

            $tag->status = $request->status;
            $tag->description = $request->description;
            $tag->meta_description = $request->meta_description;
            $tag->updated_by = Auth::guard('admin')->id();
            $tag->updated_at = Carbon::now();
            $tag->save();

            Track::newTrack($tag->title, 'Tag has been updated');
            DB::commit();
            session()->flash('success', 'Tag has been updated successfully !!');
            return redirect()->route('admin.tags.index');
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
        if (is_null($this->user) || !$this->user->can('tag.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $tag = Tag::find($id);
        if (is_null($tag)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.tags.trashed');
        }
        $tag->deleted_at = Carbon::now();
        $tag->deleted_by = Auth::guard('admin')->id();
        $tag->status = 0;
        $tag->save();

        session()->flash('success', 'Tag has been deleted successfully as trashed !!');
        return redirect()->route('admin.tags.trashed');
    }


    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('tag.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $tag = Tag::find($id);
        if (is_null($tag)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.tags.trashed');
        }
        $tag->deleted_at = null;
        $tag->deleted_by = null;
        $tag->save();

        session()->flash('success', 'Tag has been revert back successfully !!');
        return redirect()->route('admin.tags.trashed');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('tag.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $tag = Tag::find($id);
        if (is_null($tag)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.tags.trashed');
        }

        // Remove Image
        UploadHelper::deleteFile('public/assets/images/tags/' . $tag->image);

        // Delete Blog permanently
        $tag->delete();

        session()->flash('success', 'Tag has been deleted permanently !!');
        return redirect()->route('admin.tags.trashed');
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('tag.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index(true);
    }
}
