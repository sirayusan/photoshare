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
    <header id="sample">
      <nav id="gloval_fixed_menu">
        <ul id="gloval_fixed_menu_outer">
          <ul class="gnav gloval_fixed_menu_inner">
            <li>
            <a href="">Menu1</a>
            <ul>
              <li><a href="{{ route('home') }}">会員登録はこちら</a></li>
              <li><a href="{{ route('home') }}">会員登録はこちら</a></li>
              <li><a href="{{ route('home') }}">会員登録はこちら</a></li>
            </ul>
            </li>
          </ul>
          <li class="gloval_fixed_menu_inner"><a href="{{ route('home') }}">会員登録はこちら</a></li>
          <li class="gloval_fixed_menu_inner"><a href="{{ route('home') }}">会員登録はこちら</a></li>
          <li class="gloval_fixed_menu_inner"><a href="{{ route('home') }}">会員登録はこちら</a></li>
        </ul>
      </nav>
    </header>
  <!-- gloval_fixed_menuの初位置を確保すためのタグ -->
  <div class="wrap"></div>
  <a href="{{ route('posts.create') }}">投稿する</a>
  <br>
  @if (Auth::check() === true)
  <a href="{{ route('users.show',['user'=>Auth::user()]) }}">profile</a>
  @endif
  <br>
  <form action="{{ route('tag_search.index') }}" method="get">
      <input type="text" name="tags" value="">
      <input type="submit" name="" value="検索">
  </form>
  <br>
  <!-- postメソッドで移動させるためにformでpost指定 -->
  <form method="post" name="form_1" id="form_1" action="{{ route('logout') }}">
      <input type="hidden" name="user_name" placeholder="ユーザー名">
      <a href="javascript:form_1.submit()">ログアウト</a>
  <p>投稿一覧表示</p>
  @foreach ($posts as $post)
    <div class="post">
      <p>タイトル</p>
      <a href="{{ route('comments.index',['post_id' => $post->id]) }}">{{ $post['title'] }}</a>
      <p>{{ $post['comment'] }}</p>
      @if ($post->image ==  "no_image.png")
      <p><img src="{{ asset('/SystemImage/no_image.png') }}" width="80px"></p>
      @else
      <p><img src="{{ asset("/PostImage/$post->image") }}" width="80px"></p>
      @endif
    </div>
  @endforeach
  </body>
</html>
