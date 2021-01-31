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
        @yield('gloval_fixed_menu')
    </header>
    <!-- gloval_fixed_menuの初位置を確保すためのタグ -->
    <div class="wrap"></div>
    <div class="top_image_container">
        <img class="top_image"  src="{{asset('/SystemImage/top.jpg')}}" alt="top画像">
        <div class="top_image_inner">
            <p class="top_title">photoshare</p>
            <a class="top_link ghost_btn" href="{{ route('register') }}">会員登録する</a>
            <a class="top_link ghost_btn" href="{{ route('posts.create') }}">投稿する</a>
        </div>
    </div>
    <br>
    <!-- postメソッドで移動させるためにformでpost指定 -->
    <h1 class="line_Darkblue top_index">新着投稿</h1>
    <div class="posts">
        @foreach ($posts as $post)
        <div class="post">
            <a href="{{ route('posts.show',['post' => $post->id]) }}">
                @if ($post->image ==  "no_image.png")
                <img class="post_img" src="{{ asset('/SystemImage/no_image.png') }}">
                @else
                <img class="post_img" src="{{ asset("/PostImage/$post->image") }}" width="80px">
                @endif
                @if (strlen($post->title) <= 36)
                <p>{{ mb_strimwidth($post->title,0,36) }}</p>
                @else
                <p>{{ mb_strimwidth($post->title,0,30) }}.....</p>
                @endif
            </a>
            <div class="post_user">
                @if ($post->user->image ==  "user_no_image.png")
                <img class="post_icon_Image" src="{{ asset('/SystemImage/'.$post->user->image) }}">
                @else
                <img class="post_icon_Image" src="{{ asset('/UserImage/'.$post->user->image) }}">
                @endif
                <p>{{ mb_strimwidth($post->user->name,0,28) }}</p>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
