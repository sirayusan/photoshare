<?php


use App\Http\Controllers\Controller;
use App\Http\Controllers\TopController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\TagController;
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

//topページ
Route::resource('/',TopController::class)->only([
    'index'
]);

Route::group(['middleware' => ['auth']], function () {

    // この中はログインされている場合のみルーティングされる
    //投稿関連
    Route::resource('posts',PostController::class)->only([
        'create', 'store','destroy','edit','update'
    ]);

    //コメント機能
    Route::resource('/posts/{post_id}/comments',ReplyController::class)->only([
        'store'
    ]);

    //いいね機能
    Route::resource('/posts/{post_id}/favorites',FavoriteController::class)->only([
        'store','destroy'
    ]);

    //プロフィール機能
    Route::resource('users',UserController::class)->only([
        'show','update'
    ]);

    //フォロー解除
    Route::resource('follows',FollowController::class)->only([
        'store','destroy'
    ]);

    //フォロー
    Route::get('follows',[App\Http\Controllers\FollowController::class, 'post_index'])->name('follow.post_index');
});

//投稿関連
Route::resource('posts',PostController::class)->only(['show']);

//タグ検索
Route::resource('/tag_search',TagController::class)->only([
    'index'
]);

//認証機能
Auth::routes();

//ログアウト
Route::post('/user/logout',[UserController::class,'user_logout'])->name('user_logout');
