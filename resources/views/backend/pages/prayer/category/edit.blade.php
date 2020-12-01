@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.sliders.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.sliders.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
        <form action="{{ route('admin.updateDistrict',$district->id) }}" method="POST" data-parsley-validate data-parsley-focus="first">
            
                @csrf
                <div class="form-body">
                    <div class="card-body">
                        <h2>Edit District</h2>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="district_name"> District Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="district_name" name="district_name" value="{{ $district->district_name }}" placeholder="Enter District Name" required=""/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="district_name_bn"> District Name BN <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="district_name_bn" name="district_name_bn" value="{{ $district->district_name_bn }}" placeholder="Enter District Name BN" required=""/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="division"> Division Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="division" name="division" value="{{ $district->division }}" placeholder="Enter Division Name" required=""/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row ">

                            <div class="col-md-12">
                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
                                        <a href="" class="btn btn-dark">Cancel</a>
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