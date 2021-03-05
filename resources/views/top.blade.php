@extends('layouts/app')
@section('body')
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
<h1 class="line_Darkblue top_index">投稿一覧</h1>
<div class="posts">
    @foreach ($posts as $post)
    <div class="post">
        <a href="{{ route('posts.show',['post' => $post->id]) }}">
            @if ($post->image ==  "no_image.png")
            <img class="post_img" src="{{ asset('/SystemImage/no_image.png') }}">
            @else
                @if(app()->environment('production'))
                <img class="post_img" src="{{config('AWS_URL')}}/PostImage/{{ $post->image }}" width="80px">
                @elseif (app()->environment('local'))
                <img class="post_img" src="{{ asset('/PostImage/'.$post->image) }}" width="80px">
                @endif
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
                @if(app()->environment('production'))
                <img class="post_icon_Image" src="{{config('AWS_URL')}}/UserImage/{{ $post->user->image }}">
                @elseif (app()->environment('local'))
                <img class="post_icon_Image" src="{{ asset('/UserImage/'.$post->user->image) }}">
                @endif
            @endif
            <p>{{ mb_strimwidth($post->user->name,0,28) }}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection
