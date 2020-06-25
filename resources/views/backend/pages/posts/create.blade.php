@extends('backend.layouts.master')

@section('title')
@include('backend.pages.posts.partials.title')
@endsection

@section('admin-content')
@include('backend.pages.posts.partials.header-breadcrumbs')
<div class="container-fluid">
    @include('backend.layouts.partials.messages')
    <div class="create-page">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data"
            data-parsley-validate data-parsley-focus="first">
            @csrf
            <div class="form-body">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="title"> Title <span class="required">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title') }}" placeholder="Enter Title" required="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="slug">Short URL <span
                                        class="optional">(optional)</span></label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"
                                    placeholder="Enter short url (Keep blank to auto generate)" />
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="category_id"> Category <span
                                        class="optional">(optional)</span></label>
                                <br>
                                <select class="categories_select form-control custom-select " id="categories"
                                    name="category_id" style="width: 100%;">
                                    {!! $categories !!}
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label" for="status">Status <span class="required">*</span></label>
                                <select class="form-control custom-select" id="status" name="status" required>
                                    <option value="1" {{ old('status') === 1 ? 'selected' : null }}>Active</option>
                                    <option value="0" {{ old('status') === 0 ? 'selected' : null }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="featured_image"> Featured image <span
                                        class="optional">(optional)</span></label>
                                <input type="file" class="form-control dropify" data-height="70"
                                    data-allowed-file-extensions="png jpg jpeg webp" id="featured_image"
                                    name="featured_image" value="{{ old('featured_image') }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="short_description">Short Description <span
                                        class="optional">(optional)</span></label>
                                <textarea type="text" class="form-control" id="short_description"
                                    name="short_description" value="{{ old('short_description') }}"
                                    placeholder="Short Description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="featured_image_caption"> featured_image_caption
                                    <span class="optional">(optional)</span></label></label>
                                <input type="text" class="form-control" id="featured_image_caption"
                                    name="featured_image_caption" value="{{ old('featured_image_caption') }}"
                                    placeholder="Enter featured_image_caption" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">

                                <label class="control-label">Post Tags</label>
                                <select name="tag[]" class="js-example-basic-multiple" style="width:100%"
                                    multiple="multiple">
                                    @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="description">Post Description <span
                                        class="optional">(optional)</span></label>
                                {{-- <textarea type="text" class="form-control tinymce_advance" id="description"
                                    name="description" value="{{ old('description') }}"></textarea> --}}
                                <textarea type="text" class="form-control" id="summernote" name="description"
                                    value="{{ old('description') }}"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="meta_description"> Meta Description <span
                                        class="optional">(optional)</span></label>
                                <textarea type="text" class="form-control" id="meta_description" name="meta_description"
                                    value="{{ old('meta_description') }}"
                                    placeholder="Meta description for SEO"></textarea>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Save</button>
                                    <a href="{{ route('admin.posts.index') }}" class="btn btn-dark">Cancel</a>
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
    $(".categories_select").select2({
        placeholder: "Select a Category"
    });
   
    $(document).ready(function() {
        $('#summernote').summernote();
    });
 
</script>
@endsection