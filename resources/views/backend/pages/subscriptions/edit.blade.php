@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.subscriptions.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.subscriptions.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.subscriptions.update', $subscription->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                @method('put')
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="email">Email <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $subscription->email }}" placeholder="Enter email" required=""/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="status" name="status" required>
                                        <option value="1" {{ $subscription->status === 1 ? 'selected' : null }}>Active</option>
                                        <option value="0" {{ $subscription->status === 0 ? 'selected' : null }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-dark">Cancel</a>
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