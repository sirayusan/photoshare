@extends('layouts/app')
@section('body')
<!-- gloval_fixed_menuの初位置を確保すためのタグ -->
<div class="wrap"></div>
<main class="main-container">
    <article class="posts_search_block">
        <h1 class="line_Darkblue posts_search_index">フォローの投稿一覧</h1>
        <section class="post_search_posts">
            @foreach ($user->follow_user_posts as $post)
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
        </section>
    </article>
</main>
@endsection
