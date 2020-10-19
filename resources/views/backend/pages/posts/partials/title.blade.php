@if (Route::is('admin.posts.index'))
Pages
@elseif(Route::is('admin.posts.create'))
Create New Page
@elseif(Route::is('admin.posts.edit'))
Edit Page - {{ $post->title }}
@elseif(Route::is('admin.posts.show'))
View Page - {{ $post->title }}
@endif
| Admin Panel -
{{ config('app.name') }}