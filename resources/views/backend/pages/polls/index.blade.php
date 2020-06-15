@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.polls.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.polls.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.pages.polls.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="polls_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Yes</th>
                        <th>Total No</th>
                        <th>Total No Comment</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    const ajaxURL = "<?php echo Route::is('admin.polls.trashed' ? 'polls/trashed/view' : 'polls') ?>";
    $('table#polls_table').DataTable({
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
            {data: 'slug', name: 'slug'},
            {data: 'status', name: 'status'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'total_yes', name: 'total_yes'},
            {data: 'total_no', name: 'total_no'},
            {data: 'total_no_comment', name: 'total_no_comment'},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
@endsection