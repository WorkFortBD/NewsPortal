<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.subscriptions.index'))
                    Subscription List
                @elseif(Route::is('admin.subscriptions.create'))
                    Create New Subscription    
                @elseif(Route::is('admin.subscriptions.edit'))
                    Edit Subscription <span class="badge badge-info">{{ $subscription->title }}</span>
                @elseif(Route::is('admin.subscriptions.show'))
                    View Subscription <span class="badge badge-info">{{ $subscription->title }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.subscriptions.edit', $subscription->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.subscriptions.index'))
                            <li class="breadcrumb-item active" aria-current="page">Subscription List</li>
                        @elseif(Route::is('admin.subscriptions.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.subscriptions.index') }}">Subscription List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Subscription</li>
                        @elseif(Route::is('admin.subscriptions.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.subscriptions.index') }}">Subscription List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Subscription</li>
                        @elseif(Route::is('admin.subscriptions.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.subscriptions.index') }}">Subscription List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Subscription</li>
                        @endif
                        
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>