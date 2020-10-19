@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.jobs.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.jobs.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Job Title</label>
                                    <br>
                                    {{ $job_circular->title }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Short URL</label>
                                    <br>
                                    {{ $job_circular->slug }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="is_active">Status</label>
                                    <br>
                                    {{ $job_circular->is_active === 1 ? 'Active' : 'Inactive' }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="is_downloadable">Is downloadable</label>
                                    <br>
                                    {{ $job_circular->attachments[0]->is_downloadable === 1 ? 'Yes' : 'No' }}
                                </div>
                            </div>
                        </div>
                    
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="description">Job Description</label>
                                    <div>
                                        {!! $job_circular->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label" for="file">Job Circular</label>
                                    <br>
                                    @if ($job_circular->attachments[0]->file != null)
                                    {{-- <embed src="{{ asset('public/assets/files/circulars/'.$job_circular->attachments[0]->file) }}" width="780px" height="1000px" /> --}}
                                    <iframe src="{{ asset('public/assets/files/circulars/'.$job_circular->attachments[0]->file) }}" style="width:780px; height:1000px;" frameborder="0"></iframe>
                                    @else 
                                    <span class="border p-2">
                                        No File
                                    </span>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="meta_description">Job Meta Description</label>
                                    <div>
                                        {!! $job_circular->meta_description !!}
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="card-body">
                                        <a  class="btn btn-success" href="{{ route('admin.jobs.edit', $job_circular->id) }}"> <i class="fa fa-edit"></i> Edit Now</a>
                                        <a href="{{ route('admin.jobs.index') }}" class="btn btn-dark ml-2">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    $(".categories_select").select2({
        placeholder: "Select a Category"
    });
    </script>
@endsection