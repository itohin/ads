<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/user/region/{region}', 'User\RegionController@store')->name('user.region.store');

Route::group(['prefix' => '/{region}'], function () {

    /**
     * Category
     */
    Route::group(['prefix' => '/categories'], function () {
        Route::get('/', 'Category\CategoryController@index')->name('category.index');

        Route::group(['prefix' => '/{category}'], function () {
            Route::get('/listings', 'Listing\ListingController@index')->name('listings.index');
        });
    });

    /**
     * Listing
     */
    Route::group(['prefix' => '/listing'], function () {
        Route::get('/favorites', 'Listing\ListingFavoriteController@index')->name('listing.favorites.index');
        Route::post('/{listing}/favorites', 'Listing\ListingFavoriteController@store')->name('listing.favorites.store');
        Route::delete('/{listing}/favorites', 'Listing\ListingFavoriteController@destroy')->name('listing.favorites.destroy');

        Route::get('/viewed', 'Listing\ListingViewedController@index')->name('listing.viewed.index');

        Route::post('/contact', 'Listing\ListingContactController@store')->name('listing.contact.store');
    });

    Route::get('/{listing}', 'Listing\ListingController@show')->name('listings.show');
});
