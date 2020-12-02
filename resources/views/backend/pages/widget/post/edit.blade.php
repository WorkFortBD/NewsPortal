@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.sliders.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.sliders.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
        <form action="{{ route('admin.updateWidgetPost',$post->id) }}" method="POST" data-parsley-validate data-parsley-focus="first">
            
                @csrf
                <div class="form-body">
                    <div class="card-body">
                        <h2>Edit Post</h2>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title"> Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" placeholder="Enter Title" required=""/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="author"> Author </label>
                                    <input type="text" class="form-control" id="author" name="author" value="{{ $post->author }}" placeholder="Enter author"/>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="type"> Type <span class="required">*</span> </label>
                                   <select name="widget_categorie_id" id="widget_categorie_id" class="form-control">
                                       <option value="">--Select Type--</option>
                                       @foreach ($categories as $categorie)
                                            @if($categorie->id == $post->widget_categorie_id)
                                            <option value="{{$categorie->id}}" selected>{{$categorie->title}}</option>
                                            @else
                                            <option value="{{$categorie->id}}">{{$categorie->title}}</option>
                                            @endif
                                       @endforeach
                                   </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="description"> Description </label><br>
                                    <textarea name="description" id="description" rows="10" class="form-control">
                                        {{ $post->description }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row ">

                            <div class="col-md-12">
                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update </button>
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