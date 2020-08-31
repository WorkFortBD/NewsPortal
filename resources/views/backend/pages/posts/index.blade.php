@extends('backend.layouts.master')

@section('title')
@include('backend.pages.posts.partials.title')
@endsection

@section('admin-content')
@include('backend.pages.posts.partials.header-breadcrumbs')
<div class="container-fluid">
    @include('backend.pages.posts.partials.top-show')
    @include('backend.layouts.partials.messages')
    <div class="table-responsive product-table">
        <table class="table table-striped table-bordered display ajax_view" id="posts_table">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Featured Image</th>
                    <th>Status</th>
                    <th>Post Creator</th>
                    <th>Last Modified</th>
                    <th width="100">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const ajaxURL = "<?php echo Route::is('admin.posts.trashed' ? 'posts/trashed/view' : 'posts') ?>";
    $('table#posts_table').DataTable({
        dom: 'Blfrtip',
        language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
        processing: true,
        serverSide: true,
        ajax: {url: ajaxURL},
        aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
        buttons: ['excel', 'pdf', 'print'],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'category', name: 'category'},
            {data: 'featured_image', name: 'featured_image'},
            {data: 'status', name: 'status'},
            {data: 'editor', name: 'editor'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action'}
        ]
    });
</script>
@endsection