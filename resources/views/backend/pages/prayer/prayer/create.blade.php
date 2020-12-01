@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.sliders.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.sliders.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
        <h2>Create Prayer Schedule</h2>
        <form action="{{route('admin.storePrayer')}}" method="POST" data-parsley-validate data-parsley-focus="first">
            
                @csrf
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="prayer_name_en"> Prayer Name EN<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="prayer_name_en" name="prayer_name_en" value="{{ old('prayer_name_en') }}" placeholder="Enter Prayer Name EN" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="prayer_name_bn"> Prayer Name BN <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="prayer_name_bn" name="prayer_name_bn" value="{{ old('prayer_name_bn') }}" placeholder="Enter Prayer Name BN" required=""/>
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="prayer_time_en"> Prayer Time EN <span class="required">*</span></label>
                                    <input type="time" class="form-control" id="prayer_time_en" name="prayer_time_en" value="{{ old('prayer_time_en') }}" placeholder="Enter Prayer Time EN" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="prayer_time_bn"> Prayer Time BN <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="prayer_time_bn" name="prayer_time_bn" value="{{ old('prayer_time_bn') }}" placeholder="Enter Prayer Time BN" required=""/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="prayer_date"> Date </label>
                                    <input type="date" class="form-control" id="prayer_date" name="prayer_date" value="{{ old('prayer_date') }}" placeholder="Enter Date"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="district_id"> District <span class="required">*</span>
                                    </label>
                                <br>
                                    <select class="district_id form-control custom-select " id="district_id"
                                        name="district_id" style="width: 100%;">
                                        <option value="">Select District</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}"> {{ $district->district_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row ">

                            <div class="col-md-12">
                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
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