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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about-us', 'PagesController@about_us')->name('about-us');
Route::get('/contact-us', 'PagesController@contact_us')->name('contact-us');
Route::get('/privacy', 'PagesController@privacy')->name('privacy');
Route::get('/terms', 'PagesController@terms')->name('terms');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('is_admin')->group(function () {

	Route::get('admin/home', 'AdminController@dashboard')->name('admin.home');

	Route::get('admin/permissions', 'AdminController@permissions')->name('admin.permissions');
	Route::match(['get', 'post'],'admin/update_permissions', 'AdminController@update_permissions')->name('admin.update_permissions');
	Route::match(['get', 'post'],'admin/edit_permission/{permission_id}', 'AdminController@edit_permission')->name('admin.edit_permission');
	Route::get('admin/delete_permission/{permission_id}', 'AdminController@delete_permission')->name('admin.delete_permission');


	Route::get('admin/roles', 'AdminController@roles')->name('admin.roles');
	Route::match(['get', 'post'],'admin/add_role', 'AdminController@add_role')->name('admin.add_role');
	Route::match(['get', 'post'],'admin/edit_role/{role_id}', 'AdminController@edit_role')->name('admin.edit_role');
	Route::get('admin/delete_role/{role_id}', 'AdminController@delete_role')->name('admin.delete_role');

	Route::post('admin/save_user_role', 'AdminController@save_user_role')->name('admin.save_user_role');

	Route::get('admin/manage_posts', 'PostsController@index')->name('admin.manage_posts');

	Route::get('admin/manage_pages', 'ManagePagesController@index')->name('admin.manage_pages');
});

