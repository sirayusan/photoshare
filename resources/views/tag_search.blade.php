@extends('layouts/app')
@section('body')
<main class="main-container">
    <article class="posts-search-block">
        <h1 class="line_Darkblue posts_search_index">検索結果</h1>
        <section class="main-container__posts">
            @foreach ($posts as $post)
            <div class="main-container__post">
                <a href="{{ route('posts.show',['post' => $post->id]) }}">
                    @if ($post->image ==  "no_image.png")
                    <img class="main-container__post_img" src="{{ asset('/SystemImage/no_image.png') }}">
                    @else
                    <img class="main-container__post_img" src="{{ asset("/PostImage/$post->image") }}" width="80px">
                    @endif
                    @if (strlen($post->title) <= 36)
                    <p>{{ mb_strimwidth($post->title,0,36) }}</p>
                    @else
                    <p>{{ mb_strimwidth($post->title,0,30) }}.....</p>
                    @endif
                </a>
                <div class="main-container__post_user">
                    @if ($post->user->image ==  "user_no_image.png")
                    <img class="main-container__post_icon_Image" src="{{ asset('/SystemImage/'.$post->user->image) }}">
                    @else
                    <img class="main-container__post_icon_Image" src="{{ asset('/UserImage/'.$post->user->image) }}">
                    @endif
                    <p>{{ mb_strimwidth($post->user->name,0,28) }}</p>
                </div>
            </div>
            @endforeach
        </section>
    </article>
</main>
@endsection
