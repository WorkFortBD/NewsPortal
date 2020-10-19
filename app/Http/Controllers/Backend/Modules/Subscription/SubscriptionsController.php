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
                        $html = '';

                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.subscriptions.destroy', [$row->id]);
                            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 " title="Edit Subscription Details" href="' . route('admin.subscriptions.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
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
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Subscription Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }



                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Subscription will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Subscription will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Subscription will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
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

                ->editColumn('email', function ($row) {
                    return $row->email;
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
            $rawColumns = ['action', 'email', 'status'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_subscriptions = count(Subscription::select('id')->get());
        $count_active_subscriptions = count(Subscription::select('id')->where('status', 1)->get());
        $count_trashed_subscriptions = count(Subscription::select('id')->where('deleted_at', '!=', null)->get());
        return view('backend.pages.subscriptions.index', compact('count_subscriptions', 'count_active_subscriptions', 'count_trashed_subscriptions'));
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
    public function store(SubscriptionCreateRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('subscription.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        try {
            DB::beginTransaction();
            $subscription = new Subscription();

            if (is_null($this->user)) {
                $subscription->user_id = 1;
            } else {
                $subscription->user_id = Auth::guard('admin')->id();
            }

            $subscription->email = $request->email;
            $subscription->status = $request->status;
            $subscription->created_at = Carbon::now();
            $subscription->updated_at = Carbon::now();
            $subscription->save();

            Track::newTrack($subscription->email, 'New Subscription has been created');
            DB::commit();
            session()->flash('success', 'New Subscription has been created successfully !!');
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
        if (is_null($this->user) || !$this->user->can('subscription.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $subscription = Subscription::find($id);
        return view('backend.pages.subscriptions.edit', compact('subscription'));
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
            'email'  => 'required|max:100|unique:subscriptions,email,' . $subscription->id,
            'status'  => 'required'
        ]);

        try {
            DB::beginTransaction();
            if (is_null($this->user)) {
                $subscription->user_id = 1;
            } else {
                $subscription->user_id = Auth::guard('admin')->id();
            }

            $subscription->email = $request->email;
            $subscription->status = $request->status;
            $subscription->updated_by = Auth::guard('admin')->id();
            $subscription->updated_at = Carbon::now();
            $subscription->save();

            Track::newTrack($subscription->email, 'Subscription has been updated successfully !!');
            DB::commit();
            session()->flash('success', 'Subscription has been updated successfully !!');
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

        session()->flash('success', 'Subscription has been deleted successfully as trashed !!');
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

        session()->flash('success', 'Subscription has been revert back successfully !!');
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

        // Delete Subscription permanently
        $subscription->delete();

        session()->flash('success', 'Subscription has been deleted permanently !!');
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
