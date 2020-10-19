@if (Route::is('admin.subscriptions.index'))
Subscriptions 
@elseif(Route::is('admin.subscriptions.create'))
Create New Subscription
@elseif(Route::is('admin.subscriptions.edit'))
Edit Subscription {{ $subscription->title }}
@elseif(Route::is('admin.subscriptions.show'))
View Subscription {{ $subscription->title }}
@endif
| Admin Panel - 
{{ config('app.name') }}