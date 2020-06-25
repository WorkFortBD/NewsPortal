<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.posts.index'))
                Post List
                @elseif(Route::is('admin.posts.create'))
                Create New Post
                @elseif(Route::is('admin.posts.edit'))
                Edit Post <span class="badge badge-info">{{ $post->title }}</span>
                @elseif(Route::is('admin.posts.show'))
                View Post <span class="badge badge-info">{{ $post->title }}</span>
                <a class="btn btn-outline-success btn-sm" href="{{ route('admin.posts.edit', $post->id) }}"> <i
                        class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.posts.index'))
                        <li class="breadcrumb-item active" aria-current="page">Post List</li>
                        @elseif(Route::is('admin.posts.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Post List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Post</li>
                        @elseif(Route::is('admin.posts.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Post List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Page</li>
                        @elseif(Route::is('admin.posts.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Post List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Post</li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>