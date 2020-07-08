<?php

namespace App\Http\Controllers\Backend\Modules\Subscription;

use App\Helpers\StringHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\SubscriptionCreateRequest;
use App\Models\Track;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SubscriptionsController extends Controller
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
        if (is_null($this->user) || !$this->user->can('subscription.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            if ($isTrashed) {
                $subscriptions = Subscription::orderBy('id', 'desc')
                    ->where('status', 0)
                    ->get();
            } else {
                $subscriptions = Subscription::orderBy('id', 'desc')
                    ->where('deleted_at', null)
                    ->where('status', 1)
                    ->get();
            }

            $datatable = DataTables::of($subscriptions, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Poll Details" href="' . route('admin.subscriptions.show', $row->id) . '"><i class="fa fa-eye"></i></a>';

                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.subscriptions.destroy', [$row->id]);
                            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 " title="Edit Poll Details" href="' . route('admin.subscriptions.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        } else {
                            $deleteRoute =  route('admin.subscriptions.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.subscriptions.trashed.revert', [$row->id]);

                            $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                            $html .= '
                            <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Revert</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Poll Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }



                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Poll will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Poll will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Poll will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
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
                ->editColumn('slug', function ($row) {
                    return $row->slug;
                })
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge badge-success font-weight-100">Active</span>';
                    } else if ($row->deleted_at != null) {
                        return '<span class="badge badge-danger">Trashed</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                })
                ->editColumn('start_date', function ($row) {
                    return $row->start_date;
                })
                ->editColumn('end_date', function ($row) {
                    return $row->end_date;
                })
                ->editColumn('total_yes', function ($row) {
                    return $row->total_yes;
                })
                ->editColumn('total_no', function ($row) {
                    return $row->total_no;
                })
                ->editColumn('total_no_comment', function ($row) {
                    return $row->total_no_comment;
                });
            $rawColumns = ['action', 'title', 'slug', 'status', 'start_date', 'end_date', 'total_yes', 'total_no', 'total_no_comment'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_polls = count(Subscription::select('id')->get());
        $count_active_polls = count(Subscription::select('id')->where('status', 1)->get());
        $count_trashed_polls = count(Subscription::select('id')->where('deleted_at', '!=', null)->get());
        return view('backend.pages.subscriptions.index', compact('count_polls', 'count_active_polls', 'count_trashed_polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.subscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PollCreateRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('subscription.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        try {
            DB::beginTransaction();
            $subscription = new Poll();
            $subscription->title = $request->title;

            if ($request->slug) {
                $subscription->slug = $request->slug;
            } else {
                $subscription->slug = StringHelper::createSlug($request->title, 'Poll', 'slug', '');
            }

            $subscription->status = $request->status;
            $subscription->start_date = $request->start_date;
            $subscription->end_date = $request->end_date;
            $subscription->total_yes = 0;
            $subscription->total_no = 0;
            $subscription->total_no_comment = 0;
            $subscription->created_at = Carbon::now();
            $subscription->created_by = Auth::guard('admin')->id();
            $subscription->updated_at = Carbon::now();
            $subscription->save();

            Track::newTrack($subscription->title, 'New Poll has been created');
            DB::commit();
            session()->flash('success', 'New Poll has been created successfully !!');
            return redirect()->route('admin.subscriptions.index');
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
        if (is_null($this->user) || !$this->user->can('subscription.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $subscription = Subscription::find($id);
        return view('backend.pages.subscriptions.show', compact('poll'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('subscription.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $subscription = Subscription::find($id);
        return view('backend.pages.subscriptions.edit', compact('poll'));
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
        if (is_null($this->user) || !$this->user->can('subscription.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $subscription = Subscription::find($id);
        if (is_null($subscription)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.subscriptions.index');
        }

        $request->validate([
            'title'  => 'required|max:100',
            'slug'  => 'nullable|max:100|unique:polls,slug,' . $subscription->id,
            'status'  => 'required',
            'start_date'  => 'required',
            'end_date'  => 'required'
        ]);

        try {
            DB::beginTransaction();
            $subscription->title = $request->title;

            if ($request->slug) {
                $subscription->slug = $request->slug;
            } else {
                $subscription->slug = StringHelper::createSlug($request->title, 'Poll', 'slug', '');
            }

            $subscription->status = $request->status;
            $subscription->start_date = $request->start_date;
            $subscription->end_date = $request->end_date;
            $subscription->total_yes = 0;
            $subscription->total_no = 0;
            $subscription->total_no_comment = 0;
            $subscription->updated_by = Auth::guard('admin')->id();
            $subscription->updated_at = Carbon::now();
            $subscription->save();

            Track::newTrack($subscription->title, 'Poll has been updated successfully !!');
            DB::commit();
            session()->flash('success', 'Poll has been updated successfully !!');
            return redirect()->route('admin.subscriptions.index');
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
        if (is_null($this->user) || !$this->user->can('subscription.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $subscription = Subscription::find($id);
        if (is_null($subscription)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.subscriptions.trashed');
        }
        $subscription->deleted_at = Carbon::now();
        $subscription->deleted_by = Auth::guard('admin')->id();
        $subscription->status = 0;
        $subscription->save();

        session()->flash('success', 'Poll has been deleted successfully as trashed !!');
        return redirect()->route('admin.subscriptions.trashed');
    }

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('subscription.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $subscription = Subscription::find($id);
        if (is_null($subscription)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.subscriptions.trashed');
        }
        $subscription->deleted_at = null;
        $subscription->deleted_by = null;
        $subscription->save();

        session()->flash('success', 'Poll has been revert back successfully !!');
        return redirect()->route('admin.subscriptions.trashed');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('subscription.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $subscription = Subscription::find($id);
        if (is_null($subscription)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.subscriptions.trashed');
        }

        // Delete Poll permanently
        $subscription->delete();

        session()->flash('success', 'Poll has been deleted permanently !!');
        return redirect()->route('admin.subscriptions.trashed');
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('subscription.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index(true);
    }
}
