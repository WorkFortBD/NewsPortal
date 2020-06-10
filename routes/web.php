<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Front Panel Route List
|
*/

Route::get('/', 'Frontend\PagesController@homePage')->name('index');
Route::get('/categories/{slug}', 'Frontend\CategoriesController@show')->name('category.show');
Route::get('/p/{slug}', 'Frontend\SitePagesController@show')->name('pages.show');




/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Admin Panel Route List
|
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Auth::routes();

    Route::get('/', 'Backend\Modules\Dashboard\DashboardsController@index')->name('index');

    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('login.submit');
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('logout');

    // Reset Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset', 'Backend\Auth\ResetPasswordController@reset')->name('password.update');

    /**
     * Admin Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('admins', 'Backend\Modules\Admin\AdminsController');
        Route::get('admins/trashed/view', 'Backend\Modules\Admin\AdminsController@trashed')->name('admins.trashed');
        Route::get('profile/edit', 'Backend\Modules\Admin\AdminsController@editProfile')->name('admins.profile.edit');
        Route::put('profile/update', 'Backend\Modules\Admin\AdminsController@updateProfile')->name('admins.profile.update');
        Route::delete('admins/trashed/destroy/{id}', 'Backend\Modules\Admin\AdminsController@destroyTrash')->name('admins.trashed.destroy');
        Route::put('admins/trashed/revert/{id}', 'Backend\Modules\Admin\AdminsController@revertFromTrash')->name('admins.trashed.revert');
    });

    /**
     * Role & Permission Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('roles', 'Backend\Modules\Admin\RolesController');
    });


    /**
     * Category Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('categories', 'Backend\Modules\Category\CategoriesController');
        Route::get('categories/trashed/view', 'Backend\Modules\Category\CategoriesController@trashed')->name('categories.trashed');
        Route::delete('categories/trashed/destroy/{id}', 'Backend\Modules\Category\CategoriesController@destroyTrash')->name('categories.trashed.destroy');
        Route::put('categories/trashed/revert/{id}', 'Backend\Modules\Category\CategoriesController@revertFromTrash')->name('categories.trashed.revert');
    });

    /**
     * Page Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('pages', 'Backend\Modules\Page\PagesController');
        Route::get('pages/trashed/view', 'Backend\Modules\Page\PagesController@trashed')->name('pages.trashed');
        Route::delete('pages/trashed/destroy/{id}', 'Backend\Modules\Page\PagesController@destroyTrash')->name('pages.trashed.destroy');
        Route::put('pages/trashed/revert/{id}', 'Backend\Modules\Page\PagesController@revertFromTrash')->name('pages.trashed.revert');
    });

    /**
     * Blog Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('blogs', 'Backend\Modules\Blog\BlogsController');
        Route::get('blogs/trashed/view', 'Backend\Modules\Blog\BlogsController@trashed')->name('blogs.trashed');
        Route::delete('blogs/trashed/destroy/{id}', 'Backend\Modules\Blog\BlogsController@destroyTrash')->name('blogs.trashed.destroy');
        Route::put('blogs/trashed/revert/{id}', 'Backend\Modules\Blog\BlogsController@revertFromTrash')->name('blogs.trashed.revert');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
