@if (Route::is('admin.pages.index'))
Pages 
@elseif(Route::is('admin.pages.create'))
Create New Page
@elseif(Route::is('admin.pages.edit'))
Edit Page - {{ $page->title }}
@elseif(Route::is('admin.pages.show'))
View Page - {{ $page->title }}
@endif
| Admin Panel - 
{{ config('app.name') }}