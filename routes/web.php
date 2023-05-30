<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PageController;

use Yajra\DataTables\Html\Builder;

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
    $pages = App\Models\Page::All();
    $teachers = App\Models\Teacher::paginate(10);
    return view('welcome', compact('pages', 'teachers'));
})->name('welcome');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
});

Route::get('/{pageName}', [PageController::class, 'index'])->name('page');

Route::get('users', function(Builder $builder) {
    return DataTables::of(Teacher::query())->toJson();
});


