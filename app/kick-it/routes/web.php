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

Route::get('/welcome', 'PagesController@welcome')->name('welcome');
Route::get('/privacy', 'PagesController@privacy')->name('privacy');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/blog', 'PagesController@blog')->name('blog');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::post('/contact','PagesController@postContact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/email', 'HomeController@email')->name('sendEmail');

Route::get('/image/upload', 'ImageUploadController@index')->name('uploader.index');
Route::post('image/upload','ImageUploadController@store')->name('postUpload');

Route::get('stripe', 'PaymentController@getStripeForm');
Route::post('stripe', 'PaymentController@postStripePayment')->name('stripe.post');

Route::post('api/convert', 'APIController@postConvert')->name('api.convert');

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

//Route::post('profile', 'UserController@update');

//projects

Route::name('projects_path')->get('/projects', 'ProjectsController@index');
Route::name('create_project_path')->get('projects/create', 'ProjectsController@create');
Route::name('store_project_path')->post('projects/', 'ProjectsController@store');
Route::name('project_path')->get('/projects/{id}', 'ProjectsController@show');
Route::name('edit_project_path')->get('/projects/{id}/edit', 'ProjectsController@edit');
Route::name('update_project_path')->put('/projects/{id}','ProjectsController@update');
Route::name('delete_project_path')->delete('/projects/{id}','ProjectsController@destroy');
Route::get('/search','ProjectsController@search');

// comments
Route::post('comments/{project_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);

//favorites

//likes

Route::post('/like', 'ProjectsController@LikeProject')->name('like');

// donations 

Route::name('donate.index')->get('/projects/{id}/donate', 'DonationsController@index');
Route::post('donate/{project_id}', 'DonationsController@postDonate')->name('donate.post');

//admin
//posts

Route::name('posts_path')->get('/posts', 'PostsController@index');
Route::name('create_post_path')->get('posts/create', 'PostsController@create');
Route::name('store_post_path')->post('posts/', 'PostsController@store');
Route::name('post_path')->get('/posts/{id}', 'PostsController@show');
Route::name('edit_post_path')->get('/posts/{id}/edit', 'PostsController@edit');
Route::name('update_post_path')->put('/posts/{id}','PostsController@update');
Route::name('delete_post_path')->delete('/posts/{id}','PostsController@destroy');

//tags

Route::resource('tags','TagController', ['except'=>['create']]);

// categories

Route::resource('categories','CategoryController', ['except'=>['create']]);

// explore

Route::name('/explore')->get('explore', 'PagesController@explore');
Route::name('category')->get('category/{category}', 'PagesController@category');

// about (admin)

Route::name('abouts_path')->get('/abouts', 'AboutController@index');
Route::name('create_about_path')->get('abouts/create','AboutController@create');
Route::name('store_about_path')->post('abouts/','AboutController@store');
Route::name('edit_about_path')->get('/abouts/{id}/edit', 'AboutController@edit');
Route::name('delete_about_path')->delete('/abouts/{id}','AboutController@destroy');
Route::name('update_about_path')->put('/abouts/{id}','AboutController@update');
Route::name('about_path')->get('/abouts/{id}', 'AboutController@show');


// privacy (admin)
Route::name('privacys_path')->get('/privacys', 'PrivacyController@index');
Route::name('create_privacy_path')->get('privacys/create', 'PrivacyController@create');
Route::name('store_privacy_path')->post('privacy/','PrivacyController@store');
Route::name('edit_privacy_path')->get('/privacys/{id}/edit', 'PrivacyController@edit');
Route::name('delete_privacy_path')->delete('/privacys/{id}','PrivacyController@destroy');
Route::name('update_privacy_path')->put('/privacys/{id}','PrivacyController@update');
Route::name('privacy_path')->get('/privacys/{id}', 'PrivacyController@show');

//packages
Route::resource('packages','PackagesController', ['except'=>['create']]);

//pdf
Route::name('pdf.invoice')->get('/projects/{id}/invoice','PagesController@invoice');
