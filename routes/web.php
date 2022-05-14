<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\GetController;
use App\Models\Lecture;

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
    return view('home', [
        "title" => "Home",
        'active' => 'home',
        'image' => 'home-image.png'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "image1" => "trio.jpg",
        "image2" => "billa.jpg",
        "image3" => "tegar.jpg",
        'active' => 'about',
        "title" => "About"
    ]); // mengirimkan data menggunakan parameter
});


Route::get('/posts',[PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view ('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function (){
    $userCount = User::count();
    $postCount = Post::count();
    $categoryCount = Category::count();
    $lectureCount = Lecture::count();
    return view('dashboard.index', compact('userCount', 'postCount', 'categoryCount', 'lectureCount'));
})->middleware('auth');

Route::get('/dashboard/lectures/checkSlug', [DosenController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/gets/checkSlug', [GetController::class, 'checkSlug'])->middleware('auth');


Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/lectures', DosenController::class)->middleware('auth');
Route::resource('/dashboard/gets', GetController::class)->middleware('auth');


Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');


