<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.jobs.index'))
                    Job List
                @elseif(Route::is('admin.jobs.create'))
                    Create New Job    
                @elseif(Route::is('admin.jobs.edit'))
                    Edit Job <span class="badge badge-info">{{ $job->title }}</span>
                @elseif(Route::is('admin.jobs.show'))
                    View Job <span class="badge badge-info">{{ $job->title }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.jobs.edit', $job->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.jobs.index'))
                            <li class="breadcrumb-item active" aria-current="page">Job List</li>
                        @elseif(Route::is('admin.jobs.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.jobs.index') }}">Job List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Job</li>
                        @elseif(Route::is('admin.jobs.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.jobs.index') }}">Job List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Job</li>
                        @elseif(Route::is('admin.jobs.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.jobs.index') }}">Job List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Job</li>
                        @endif
                        
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>