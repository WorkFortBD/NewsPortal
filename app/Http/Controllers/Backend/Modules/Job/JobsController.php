<?php

namespace App\Http\Controllers\Backend\Modules\Job;

use App\Helpers\StringHelper;
use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use App\Models\JobCircular;
use App\Models\JobAttachment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class JobsController extends Controller
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
        if (is_null($this->user) || !$this->user->can('job.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            if ($isTrashed) {
                $job_circulars = JobCircular::orderBy('id', 'desc')
                    ->where('is_active', 0)
                    ->get();
            } else {
                $job_circulars = JobCircular::orderBy('id', 'desc')
                    ->where('deleted_at', null)
                    ->where('is_active', 1)
                    ->get();
            }


            $datatable = DataTables::of($job_circulars, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Job Circular Details" href="' . route('admin.jobs.show', $row->id) . '"><i class="fa fa-eye"></i></a>';

                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.jobs.destroy', [$row->id]);
                            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 " title="Edit Job Circular Details" href="' . route('admin.jobs.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        } else {
                            $deleteRoute =  route('admin.jobs.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.jobs.trashed.revert', [$row->id]);

                            $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                            $html .= '
                            <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Revert</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Job Circular Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }



                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Job Circular will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Job Circular will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Job Circular will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
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
                ->editColumn('description', function ($row) {
                    return $row->description;
                })
                ->editColumn('is_active', function ($row) {
                    if ($row->is_active) {
                        return '<span class="badge badge-success font-weight-100">Active</span>';
                    } else if ($row->deleted_at != null) {
                        return '<span class="badge badge-danger">Trashed</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                });
            $rawColumns = ['action', 'title', 'is_active', 'description'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_jobs = count(JobCircular::select('id')->get());
        $count_active_jobs = count(JobCircular::select('id')->where('is_active', 1)->get());
        $count_trashed_jobs = count(JobCircular::select('id')->where('deleted_at', '!=', null)->get());
        return view('backend.pages.jobs.index', compact('count_jobs', 'count_active_jobs', 'count_trashed_jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('job.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $request->validate(
            [
                'title'  => 'required|max:100',
                'slug'  => 'nullable|max:100|unique:pages,slug',
                'file'  => 'required|file',
                'is_downloadable'  => 'nullable',
                'is_date_applicable'  => 'nullable',
                'description'  => 'nullable',
                'meta_description'  => 'nullable'
            ],
            [
                'title.required' => 'Please give a title',
                'file.required' => 'Please upload job circular'
            ]
        );

        try {
            DB::beginTransaction();
            $job_circular = new JobCircular();
            $job_circular->title = $request->title;

            // if ($request->slug) {
            //     $job_circular->slug = $request->slug;
            // } else {
            //     $job_circular->slug = StringHelper::createSlug($request->title, 'Blog', 'slug', '');
            // }

            $job_circular->slug = $this->make_slug($request->title);

            $job_circular->is_active = $request->is_active;

            if ($request->is_date_applicable) {
                $job_circular->is_date_applicable = $request->is_date_applicable;
            } else {
                $job_circular->is_date_applicable = 0;
            }

            $job_circular->start_date = $request->start_date;
            $job_circular->end_date = $request->end_date;
            $job_circular->description = $request->description;
            $job_circular->meta_description = $request->meta_description;
            $job_circular->created_at = Carbon::now();
            $job_circular->created_by = Auth::guard('admin')->id();
            $job_circular->updated_at = Carbon::now();
            $job_circular->save();

            $jobSave = $job_circular->save();
            if ($jobSave) {
                $getId = $job_circular->id;
                $jobAttachment = new JobAttachment();
                $jobAttachment->job_circular_id = $getId;
                $jobAttachment->file = UploadHelper::upload('file', $request->file, $request->title . '-' . time() . '-circular', 'public/assets/files/circulars');
                $jobAttachment->extension = $request->file->getClientOriginalExtension();
                if ($request->is_downloadable) {
                    $jobAttachment->is_downloadable = $request->is_downloadable;
                } else {
                    $jobAttachment->is_downloadable = 1;
                }
                $job_circular->created_at = Carbon::now();
                $job_circular->created_by = Auth::guard('admin')->id();
                $job_circular->updated_at = Carbon::now();
                $jobAttachment->save();
            }

            Track::newTrack($job_circular->title, 'New Job Circular has been created');
            DB::commit();
            session()->flash('success', 'New Job Circular has been created successfully !!');
            return redirect()->route('admin.jobs.index');
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
        if (is_null($this->user) || !$this->user->can('job.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $job_circular = JobCircular::find($id);
        return view('backend.pages.jobs.show', compact('job_circular'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('job.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $job_circular = JobCircular::find($id);

        return view('backend.pages.jobs.edit', compact('job_circular'));
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
        if (is_null($this->user) || !$this->user->can('job.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $job_circular = JobCircular::find($id);
        if (is_null($job_circular)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.jobs.index');
        }

        $request->validate([
            'title'  => 'required|max:100',
            'slug'  => 'required|max:100|unique:pages,slug,' . $job_circular->id,
            'file'  => 'required|file',
            'is_downloadable'  => 'nullable',
            'is_date_applicable'  => 'nullable',
            'description'  => 'nullable',
            'meta_description'  => 'nullable'
        ],
        [
            'title.required' => 'Please give a title',
            'file.required' => 'Please upload job circular'
        ]
    );

        try {
            DB::beginTransaction();
            $job_circular->title = $request->title;

            // if ($request->slug) {
            //     $job_circular->slug = $request->slug;
            // } else {
            //     $job_circular->slug = StringHelper::createSlug($request->title, 'Blog', 'slug', '');
            // }

            $job_circular->slug = $this->make_slug($request->title);

            $job_circular->is_active = $request->is_active;

            if ($request->is_date_applicable) {
                $job_circular->is_date_applicable = $request->is_date_applicable;
            } else {
                $job_circular->is_date_applicable = 0;
            }

            $job_circular->start_date = $request->start_date;
            $job_circular->end_date = $request->end_date;
            $job_circular->description = $request->description;
            $job_circular->meta_description = $request->meta_description;
            $job_circular->updated_by = Auth::guard('admin')->id();
            $job_circular->updated_at = Carbon::now();
            $job_circular->save();

            $jobSave = $job_circular->save();
            if ($jobSave) {
                // Delete previous attachments
                $getId = $job_circular->id;
                $attachmentToDelete = JobAttachment::where('job_circular_id', $getId)->first();
                if ($attachmentToDelete) {
                    $attachmentToDelete->delete();
                }
                // Create new attachments
                $jobAttachment = new JobAttachment();
                $jobAttachment->job_circular_id = $getId;
                $jobAttachment->file = UploadHelper::upload('file', $request->file, $request->title . '-' . time() . '-circular', 'public/assets/files/circulars');
                $jobAttachment->extension = $request->file->getClientOriginalExtension();
                if ($request->is_downloadable) {
                    $jobAttachment->is_downloadable = $request->is_downloadable;
                } else {
                    $jobAttachment->is_downloadable = 1;
                }
                $job_circular->created_at = Carbon::now();
                $job_circular->created_by = Auth::guard('admin')->id();
                $job_circular->updated_at = Carbon::now();
                $jobAttachment->save();
            }

            Track::newTrack($job_circular->title, 'Job Circular has been updated successfully !!');
            DB::commit();
            session()->flash('success', 'Job Circular has been updated successfully !!');
            return redirect()->route('admin.jobs.index');
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
        if (is_null($this->user) || !$this->user->can('job.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $job_circular = JobCircular::find($id);
        if (is_null($job_circular)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.jobs.trashed');
        }
        $job_circular->deleted_at = Carbon::now();
        $job_circular->deleted_by = Auth::guard('admin')->id();
        $job_circular->is_active = 0;
        $job_circular->save();

        session()->flash('success', 'Blog has been deleted successfully as trashed !!');
        return redirect()->route('admin.jobs.trashed');
    }

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('job.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $job_circular = JobCircular::find($id);
        if (is_null($job_circular)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.jobs.trashed');
        }
        $job_circular->deleted_at = null;
        $job_circular->deleted_by = null;
        $job_circular->save();

        session()->flash('success', 'Blog has been revert back successfully !!');
        return redirect()->route('admin.jobs.trashed');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('job.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $job_circular = JobCircular::find($id);
        if (is_null($job_circular)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.jobs.trashed');
        }

        // Remove Image
        UploadHelper::deleteFile('public/assets/images/blogs/' . $job_circular->image);

        // Delete Blog permanently
        $job_circular->delete();

        session()->flash('success', 'Blog has been deleted permanently !!');
        return redirect()->route('admin.jobs.trashed');
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data is_active = 0 and deleted_at != null
     */
    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('job.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index(true);
    }

    /**
     * make_slug
     *
     * @param string $string
     * @return string slug
     */
    public function make_slug($string)
    {
        return preg_replace('/\s+/u', '-', trim($string));
    }
}
