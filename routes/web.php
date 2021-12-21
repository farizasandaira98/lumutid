<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/post', 'HomeController@post')->name('home');
Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin');
Route::get('admin/register', 'AdminController@showFormRegister')->name('admin.register');
Route::post('admin/register', 'AdminController@register')->name('admin.register.submit');

Route::get('admin/', 'AdminController@index')->name('admin.dashboard');  

Route::get('admin/post', 'AdminController@post')->name('admin.post');
Route::get('admin/posttambah', 'AdminController@posttambah')->name('admin.posttambah');
Route::post('admin/poststore', 'AdminController@poststore')->name('admin.poststore');;
Route::get('admin/postedit/{id}', 'AdminController@postedit');
Route::post('admin/postupdate/{id}', 'AdminController@postupdate');
Route::get('admin/posthapus/{id}', 'AdminController@postdestroy');

Route::get('admin/akun', 'AdminController@akun')->name('admin.akun');
Route::get('admin/akunhapus/{id}', 'AdminController@akundestroy');
Route::get('admin/akunauthor', 'AdminController@akunauthor')->name('admin.akun');
Route::get('admin/akunhapusauthor/{id}', 'AdminController@akundestroyauthor');      


Route::get('author/login', 'Auth\AuthorAuthController@getLogin')->name('author.login');
Route::post('author/login', 'Auth\AuthorAuthController@postLogin');
Route::get('author/register', 'AuthorController@showFormRegister')->name('author.register');
Route::post('author/register', 'AuthorController@register')->name('author.register.submit');

Route::get('author/', 'AuthorController@index')->name('author.dashboard');  

Route::get('author/post', 'AuthorController@post')->name('author.post');
Route::get('author/posttambah', 'AuthorController@posttambah')->name('author.posttambah');
Route::post('author/poststore', 'AuthorController@poststore')->name('author.poststore');;
Route::get('author/postedit/{id}', 'AuthorController@postedit');
Route::post('author/postupdate/{id}', 'AuthorController@postupdate');
Route::get('author/posthapus/{id}', 'AuthorController@postdestroy');
