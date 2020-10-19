@extends('backend.layouts.master')

@section('title')
@include('backend.pages.posts.partials.title')
@endsection

@section('admin-content')
@include('backend.pages.posts.partials.header-breadcrumbs')
<div class="container-fluid">
    @include('backend.layouts.partials.messages')
    <div class="create-page">
        <div class="form-body">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="title">Page Title</label>
                            <br>
                            {{ $post->title }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="slug">Short URL</label>
                            <br>
                            {{ $post->slug }}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="category_id">Page Category</label>
                            <br>
                            {{ $post->category != null ? $post->category->name : '-' }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-success">
                            <label class="control-label" for="status">Status</label>
                            <br>
                            {{ $post->status === 1 ? 'Active' : 'Inactive' }}
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="image"> Featured Image</label>
                            <br>
                            @if ($post->featured_image != null)
                            <img src="{{ asset('public/assets/images/posts/'.$post->featured_image) }}" alt="Image"
                                class="img width-100" />
                            @else
                            <span class="border p-2">
                                No Image
                            </span>
                            @endif

                        </div>
                    </div>
                </div>


                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="description">Page Description</label>
                            <div>
                                {!! $post->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="meta_description">Page Meta Description</label>
                            <div>
                                {!! $post->meta_description !!}
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="card-body">
                                <a class="btn btn-success" href="{{ route('admin.posts.edit', $post->id) }}"> <i
                                        class="fa fa-edit"></i> Edit Now</a>
                                <a href="{{ route('admin.posts.index') }}" class="btn btn-dark ml-2">Cancel</a>
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