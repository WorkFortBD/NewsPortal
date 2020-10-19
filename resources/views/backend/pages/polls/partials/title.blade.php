@if (Route::is('admin.polls.index'))
Polls 
@elseif(Route::is('admin.polls.create'))
Create New Poll
@elseif(Route::is('admin.polls.edit'))
Edit Poll {{ $poll->title }}
@elseif(Route::is('admin.polls.show'))
View Poll {{ $poll->title }}
@endif
| Admin Panel - 
{{ config('app.name') }}