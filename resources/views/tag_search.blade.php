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
                            <li><a href="{{ route('login') }}">会員登録はこちら</a></li>
                            <li><a href="{{ route('login') }}">会員登録はこちら</a></li>
                            <li><a href="{{ route('login') }}">会員登録はこちら</a></li>
                        </ul>
                    </li>
                </ul>
                <li class="gloval_fixed_menu_inner"><a href="{{ route('login') }}">会員登録はこちら</a></li>
                <li class="gloval_fixed_menu_inner"><a href="{{ route('login') }}">会員登録はこちら</a></li>
                <li class="gloval_fixed_menu_inner"><a href="{{ route('login') }}">会員登録はこちら</a></li>
            </ul>
        </nav>
    </header>
    <!-- gloval_fixed_menuの初位置を確保すためのタグ -->
    <div class="wrap"></div>
    <p>タグ検索結果</p>
    <a href="{{ route('posts.create') }}">投稿する</a>
    <br>
    <a href="{{ route('top.index') }}">トップへ</a>
    <div>
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
    </div>
</body>
</html>
