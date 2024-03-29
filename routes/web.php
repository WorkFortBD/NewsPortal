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
Route::get('/bangladesh', 'Frontend\PagesController@bangladeshNews')->name('bangladesh');
Route::get('/international', 'Frontend\PagesController@internationalNews')->name('international');
Route::get('/economic', 'Frontend\PagesController@economicalNews')->name('economic');
Route::get('/sports', 'Frontend\PagesController@sportsNews')->name('sports');
Route::get('/entertainment', 'Frontend\PagesController@entertainmentNews')->name('entertainment');
Route::get('/akij-city', 'Frontend\PagesController@akijCityNews')->name('akij-city');
Route::get('/all-news', 'Frontend\PagesController@allNews')->name('all-news');
Route::get('/education', 'Frontend\PagesController@educationNews')->name('education');
// Route::post('/category', 'Frontend\PagesController@categoryNews')->name('category-news');
Route::get('/quran-hadith', 'Frontend\PagesController@quranNews')->name('quran-hadith');

Route::get('/news/{slug}', 'Frontend\PagesController@singleNews')->name('single-article');
Route::get('/categories/{slug}', 'Frontend\CategoriesController@show')->name('category.show');
Route::get('/p/{slug}', 'Frontend\SitePagesController@show')->name('pages.show');

Route::post('storePoll/{id}','Frontend\PollResponseController@storePoll')->name('storePoll');

Route::get('/showPrayer/{id}','Frontend\PrayerController@showList')->name('showList');
// Route::get('/articles/{id}/{slug}', 'Frontend\CategoriesController@show')->name('category.show');




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| API Route List
|
*/
Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
    Route::get('/districts', 'API\MasterDataController@getDistricts');
    Route::get('/prayers/{district_id}', 'API\PrayersController@getPrayerByDistrict');
});


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
     * Post Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('posts', 'Backend\Modules\Post\PostsController');
        Route::get('posts/trashed/view', 'Backend\Modules\Post\PostsController@trashed')->name('posts.trashed');
        Route::delete('posts/trashed/destroy/{id}', 'Backend\Modules\Post\PostsController@destroyTrash')->name('posts.trashed.destroy');
        Route::put('posts/trashed/revert/{id}', 'Backend\Modules\Post\PostsController@revertFromTrash')->name('posts.trashed.revert');
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

    /**
     * Tag Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('tags', 'Backend\Modules\Tag\TagController');
        Route::get('tags/trashed/view', 'Backend\Modules\Tag\TagController@trashed')->name('tags.trashed');
        Route::delete('tags/trashed/destroy/{id}', 'Backend\Modules\Tag\TagController@destroyTrash')->name('tags.trashed.destroy');
        Route::put('tags/trashed/revert/{id}', 'Backend\Modules\Tag\TagController@revertFromTrash')->name('tags.trashed.revert');
    });

    /**
     * Poll Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('polls', 'Backend\Modules\Poll\PollsController');
        Route::get('polls/trashed/view', 'Backend\Modules\Poll\PollsController@trashed')->name('polls.trashed');
        Route::delete('polls/trashed/destroy/{id}', 'Backend\Modules\Poll\PollsController@destroyTrash')->name('polls.trashed.destroy');
        Route::put('polls/trashed/revert/{id}', 'Backend\Modules\Poll\PollsController@revertFromTrash')->name('polls.trashed.revert');
    });

    

    /**
     * Slider Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('sliders', 'Backend\Modules\Slider\SlidersController');
        Route::get('sliders/trashed/view', 'Backend\Modules\Slider\SlidersController@trashed')->name('sliders.trashed');
        Route::delete('sliders/trashed/destroy/{id}', 'Backend\Modules\Slider\SlidersController@destroyTrash')->name('sliders.trashed.destroy');
        Route::put('sliders/trashed/revert/{id}', 'Backend\Modules\Slider\SlidersController@revertFromTrash')->name('sliders.trashed.revert');
    });

    /* Post Comment Management Routes */
    Route::group(['prefix' => ''], function () {
        Route::resource('postcomments', 'Backend\Modules\PostComment\PostCommentsController');
        Route::get('postcomments/trashed/view', 'Backend\Modules\PostComment\PostCommentsController@trashed')->name('postcomments.trashed');
        Route::delete('postcomments/trashed/destroy/{id}', 'Backend\Modules\PostComment\PostCommentsController@destroyTrash')->name('postcomments.trashed.destroy');
        Route::put('postcomments/trashed/revert/{id}', 'Backend\Modules\PostComment\PostCommentsController@revertFromTrash')->name('postcomments.trashed.revert');
    });

    /**
     * Document Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::get('documents/videos', 'Backend\Modules\Document\DocumentsController@getAllVideos')->name('documents.videos');
        Route::get('documents/all/images', 'Backend\Modules\Document\DocumentsController@getImages')->name('documents.images');
        Route::get('documents/all/documents', 'Backend\Modules\Document\DocumentsController@getAllDocuments')->name('documents.documents');
        Route::get('documents/all/audios', 'Backend\Modules\Document\DocumentsController@getAllAudios')->name('admin.documents.audios');

        Route::resource('documents', 'Backend\Modules\Document\DocumentsController');
        // admin/documents/images -> show()
    });

    /**
     * Subscription Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('subscriptions', 'Backend\Modules\Subscription\SubscriptionsController');
        Route::get('subscriptions/trashed/view', 'Backend\Modules\Subscription\SubscriptionsController@trashed')->name('subscriptions.trashed');
        Route::delete('subscriptions/trashed/destroy/{id}', 'Backend\Modules\Subscription\SubscriptionsController@destroyTrash')->name('subscriptions.trashed.destroy');
        Route::put('subscriptions/trashed/revert/{id}', 'Backend\Modules\Subscription\SubscriptionsController@revertFromTrash')->name('subscriptions.trashed.revert');
    });

    Route::group(['prefix' => ''], function () {
        Route::get('widget-category/index','Backend\Modules\WidgetCategory\WidgetCategoryController@indexWidgetCategory')->name('indexWidgetCategory');
        Route::get('widget-category/create','Backend\Modules\WidgetCategory\WidgetCategoryController@createWidgetCategory')->name('createWidgetCategory');
        Route::post('widget-category/store','Backend\Modules\WidgetCategory\WidgetCategoryController@storeWidgetCategory')->name('storeWidgetCategory');
        Route::get('widget-category/edit/{id}','Backend\Modules\WidgetCategory\WidgetCategoryController@editWidgetCategory')->name('editWidgetCategory');
        Route::post('widget-category/update/{id}','Backend\Modules\WidgetCategory\WidgetCategoryController@updateWidgetCategory')->name('updateWidgetCategory');

        Route::get('widget-post/index','Backend\Modules\WidgetCategory\WidgetCategoryController@indexWidgetPost')->name('indexWidgetPost');
        Route::get('widget-post/create','Backend\Modules\WidgetCategory\WidgetCategoryController@createWidgetPost')->name('createWidgetPost');
        Route::get('widget-post/edit/{id}','Backend\Modules\WidgetCategory\WidgetCategoryController@editWidgetPost')->name('editWidgetPost');
        Route::post('widget-post/store','Backend\Modules\WidgetCategory\WidgetCategoryController@storeWidgetPost')->name('storeWidgetPost');
        Route::post('widget-post/update/{id}','Backend\Modules\WidgetCategory\WidgetCategoryController@updateWidgetPost')->name('updateWidgetPost');
     });

     Route::group(['prefix' => ''], function () {
        Route::get('district/index','Backend\Modules\Prayer\PrayerController@indexDistrict')->name('indexDistrict');
        Route::get('create-district/create','Backend\Modules\Prayer\PrayerController@createDistrict')->name('createDistrict');
        Route::get('edit-district/edit/{id}','Backend\Modules\Prayer\PrayerController@editDistrict')->name('editDistrict');

        Route::post('store-district/store','Backend\Modules\Prayer\PrayerController@storeDistrict')->name('storeDistrict');
        Route::post('update-district/update/{id}','Backend\Modules\Prayer\PrayerController@updateDistrict')->name('updateDistrict');
     });

     Route::group(['prefix' => ''], function () {
        Route::get('prayer/index','Backend\Modules\Prayer\PrayerController@indexPrayer')->name('indexPrayer');
        Route::get('create-prayer/create','Backend\Modules\Prayer\PrayerController@createPrayer')->name('createPrayer');
        Route::get('edit-prayer/edit/{id}','Backend\Modules\Prayer\PrayerController@editPrayer')->name('editPrayer');

        Route::post('store-prayer/store','Backend\Modules\Prayer\PrayerController@storePrayer')->name('storePrayer');
        Route::post('update-prayer/update/{id}','Backend\Modules\Prayer\PrayerController@updatePrayer')->name('updatePrayer');
     });

    //  Route::group(['prefix' => ''], function () {
    //     Route::get('widget-post/create','Backend\Modules\WidgetPost\WidgetPostController@createWidgetPost')->name('createWidgetPost');
    //      Route::post('widget-category/store','Backend\Modules\WidgetCategory\WidgetCategoryController@storeWidgetCategory')->name('storeWidgetCategory');
    //  });

    /**
     * Job Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('jobs', 'Backend\Modules\Job\JobsController');
        Route::get('jobs/trashed/view', 'Backend\Modules\Job\JobsController@trashed')->name('jobs.trashed');
        Route::delete('jobs/trashed/destroy/{id}', 'Backend\Modules\Job\JobsController@destroyTrash')->name('jobs.trashed.destroy');
        Route::put('jobs/trashed/revert/{id}', 'Backend\Modules\Job\JobsController@revertFromTrash')->name('jobs.trashed.revert');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('reset-everything', function () {
//     app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
//     return 'Congratualation Man !!';
// });
