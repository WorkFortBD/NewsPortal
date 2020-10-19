@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.postcomments.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.postcomments.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.pages.postcomments.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="postcomments_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Comment</th>
                        <th>Ip Address</th>
                        <th>Status</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    const ajaxURL = "<?php echo Route::is('admin.postcomments.trashed' ? 'postcomments/trashed/view' : 'postcomments') ?>";
    $('table#postcomments_table').DataTable({
        dom: 'Blfrtip',
        language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
        processing: true,
        serverSide: true,
        ajax: {url: ajaxURL},
        aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
        buttons: ['excel', 'pdf', 'print'],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'comment', name: 'comment'},
            {data: 'ip_address', name: 'ip_address'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
@endsection