@if (Route::is('admin.jobs.index'))
Jobs 
@elseif(Route::is('admin.jobs.create'))
Create New Job
@elseif(Route::is('admin.jobs.edit'))
Edit Job {{ $job->title }}
@elseif(Route::is('admin.jobs.show'))
View Job {{ $job->title }}
@endif
| Admin Panel - 
{{ config('app.name') }}