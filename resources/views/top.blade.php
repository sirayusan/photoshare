<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>トップページ</title>
    <!-- スタイルを明示的にすべてリセットする -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" />
    <!-- スタイル指定 -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>
<body>
    <header>
        <div class="gloval_fixed_-menu">
            <a href="{{ route('top.index') }}">photoshare</a>
            <input type="checkbox" id="menu-btn-check">
            <label for="menu-btn-check" class="menu-btn"><span></span></label>
            <!--ここからメニュー-->
            <div class="menu-content">
                <ul>
                    <li>
                        <a href="{{ route('top.index') }}">メニューリンク1</a>
                    </li>
                    <li>
                        <a href="#">メニューリンク2</a>
                    </li>
                    <li>
                        <a href="#">メニューリンク3</a>
                    </li>
                </ul>
            </div>
            <!--ここまでメニュー-->
        </div>
    </header>
    <!-- gloval_fixed_menuの初位置を確保すためのタグ -->
    <div class="wrap"></div>
    <div class="top_image_container">
        <p id="top_image_bolock"><img id=top_image  src="{{asset('/SystemImage/top.jpg')}}" alt="top画像"></p>
        <p id="top_title">photoshare</p>
        <a id="top_register_link" href="{{ route('register') }}">会員登録する</a>
    </div>
    <form action="{{ route('tag_search.index') }}" method="get">
        <input type="text" name="tags" value="">
        <input type="submit" name="" value="検索">
    </form>
    <a href="{{ route('posts.create') }}">投稿する</a>
    <br>
    @if (Auth::check() === true)
    <a href="{{ route('users.show',['user'=>Auth::user()]) }}">profile</a>
    @endif
    <br>
    <br>
    <!-- <img src="{{ asset('UserImage/20201203_062307.jpg') }}" alt=""> -->
    <!-- postメソッドで移動させるためにformでpost指定 -->
    <form method="post" name="form_1" id="form_1" action="{{ route('logout') }}">
        <input type="hidden" name="user_name" placeholder="ユーザー名">
        <a href="javascript:form_1.submit()">ログアウト</a>
        <p>投稿一覧表示</p>
        @foreach ($posts as $post)
        <div class="post">
            <a href="{{ route('posts.show',['post' => $post->id]) }}">{{ $post['title'] }}
                <p>タイトル</p>
                <p>{{ $post['comment'] }}</p>
                @if ($post->image ==  "no_image.png")
                <p><img src="{{ asset('/SystemImage/no_image.png') }}" width="80px"></p>
                @else
                <p><img src="{{ asset("/PostImage/$post->image") }}" width="80px"></p>
                @endif
            </a>
        </div>
        @endforeach
    </body>
    </html>
