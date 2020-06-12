<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.polls.index'))
                    Poll List
                @elseif(Route::is('admin.polls.create'))
                    Create New Poll    
                @elseif(Route::is('admin.polls.edit'))
                    Edit Poll <span class="badge badge-info">{{ $poll->title }}</span>
                @elseif(Route::is('admin.polls.show'))
                    View Poll <span class="badge badge-info">{{ $poll->title }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.polls.edit', $poll->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.polls.index'))
                            <li class="breadcrumb-item active" aria-current="page">Poll List</li>
                        @elseif(Route::is('admin.polls.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.polls.index') }}">Poll List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Poll</li>
                        @elseif(Route::is('admin.polls.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.polls.index') }}">Poll List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Poll</li>
                        @elseif(Route::is('admin.polls.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.polls.index') }}">Poll List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Poll</li>
                        @endif
                        
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>