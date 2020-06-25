@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.polls.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.polls.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.polls.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Poll Title <span class="required">*</span></label>
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
                                    <label class="control-label" for="start_date">Start Date <span class="required">*</span></label>
                                    <div class='input-group date' id='start_date'>
                                        <input type='datetime-local' class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required=""/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="end_date">End Date <span class="required">*</span></label>
                                    <div class='input-group date' id='end_date'>
                                        <input type='datetime-local' class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required=""/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="status" name="status" required>
                                        <option value="1" {{ old('status') === 1 ? 'selected' : null }}>Active</option>
                                        <option value="0" {{ old('status') === 0 ? 'selected' : null }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <a href="{{ route('admin.polls.index') }}" class="btn btn-dark">Cancel</a>
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