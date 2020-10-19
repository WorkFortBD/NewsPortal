@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.jobs.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.jobs.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.jobs.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Job Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter Title" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Short URL <span class="optional">(optional)</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" placeholder="Enter short url (Keep blank to auto generate)" />
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="file">Job Circular <span class="required">*</span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="pdf doc docx" id="file" name="file" value="{{ old('file') }}"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="is_active">Is active? <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="is_active" name="is_active" required>
                                        <option value="1" {{ old('is_active') === 1 ? 'selected' : null }}>Active</option>
                                        <option value="0" {{ old('is_active') === 0 ? 'selected' : null }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="is_downloadable">Is downloadable? <span class="optional">(optional)</span></label>
                                    <select class="form-control custom-select" id="is_downloadable" name="is_downloadable">
                                        <option value="1" {{ old('is_downloadable') === 1 ? 'selected' : null }}>Yes</option>
                                        <option value="0" {{ old('is_downloadable') === 0 ? 'selected' : null }}>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="is_date_applicable">Is date applicable? <span class="optional">(optional)</span></label>
                                    <select class="form-control custom-select" id="is_date_applicable" name="is_date_applicable">
                                        <option value="0" {{ old('is_date_applicable') === 0 ? 'selected' : null }}>No</option>
                                        <option value="1" {{ old('is_date_applicable') === 1 ? 'selected' : null }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="start_date">Start Date <span class="optional">(optional)</span></label>
                                    <div class='input-group date' id='start_date'>
                                        <input type='datetime-local' class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="end_date">End Date <span class="optional">(optional)</span></label>
                                    <div class='input-group date' id='end_date'>
                                        <input type='datetime-local' class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="description">Job Description <span class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control tinymce_advance" id="description" name="description" value="{{ old('description') }}"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="meta_description">Job Meta Description <span class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control" id="meta_description" name="meta_description" value="{{ old('meta_description') }}" placeholder="Meta description for SEO"></textarea>
                                </div>
                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <a href="{{ route('admin.jobs.index') }}" class="btn btn-dark">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    
    </script>
@endsection