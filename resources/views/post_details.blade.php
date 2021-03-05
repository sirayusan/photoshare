@extends('layouts/app')
@section('body')
<!-- gloval_fixed_menuの初位置を確保すためのタグ -->
<div class="wrap"></div>
<main class="main">
    <article>
        @if (session('error'))
        <p class="text-danger mt-3">
            {{ session('error') }}
        </p>
        @endif
        <h1 class="line_Darkblue post_detail_index">{{ $post->title }}</h1>
        <h2>投稿日:{{ $post->created_at }}</h2>
        <h2 class="tags">
            @foreach($post->tags as $tag)
            {{ $tag->tag }}
            @endforeach
        </h2>
        <ul class="shareSns">
            <li><a class="icon-LINE" href="https://social-plugins.line.me/lineit/share?url={{ route('posts.show',['post' => $post->id]) }}"><img src="{{ asset("/SystemImage/LINE.jpg") }}" ></a></li>
            <li><a class="icon-facebook" href="https://www.facebook.com/sharer.php?src=bm&u={{ route('posts.show',['post' => $post->id]) }}"><img src="{{ asset("/SystemImage/Facebook.jpg") }}" ></a></li>
            <li><a class="icon-twitter" href="https://twitter.com/intent/tweet?url={{ route('posts.show',['post' => $post->id]) }}"><img src="{{ asset("/SystemImage/Twitter.jpg") }}" ></a></li>
        </ul>
    </article>
    @if ($post->image ==  "no_image.png")
    <img class="post_detail_image" src="{{ asset('/SystemImage/no_image.png') }}">
    @else
        @if(app()->environment('production'))
        <img class="post_detail_image" src="{{config('app.AWS_URL')}}/PostImage/{{ $post->image }}">
        @else
        <img class="post_detail_image" src="{{ asset('/PostImage/'.$post->image) }}">
        @endif
    @endif
    <article class="post_user_block">
        @if ($post->user->image ==  "user_no_image.png")
        <img src="{{ asset('/SystemImage/user_no_image.png') }}">
        @else
            @if(app()->environment('production'))
            <img src="{{config('app.AWS_URL')}}/UserImage/{{$post->user->image}}">
            @else
            <img src="{{ asset('/UserImage/'.$post->user->image) }}">
            @endif
        @endif
        <p class="post_detail_user_name">{{ $post->user->name }}</p>
        @if ($follow->already_follow($post->user->id))
        <form action="{{ route('follows.destroy',['follow' => $follow->get_follow_id($post->user->id)]) }}" method="post">
            @method('DELETE')
            @csrf
            <input class="follow_button" type="submit" value="フォロー解除">
        </form>
        @else
        <form action="{{ route('follows.store',['follow_user_id' => $post->user->id]) }}" method="post">
            @csrf
            <input class="follow_button" type="submit" value="フォロー" >
        </form>
        @endif
        @if ($post->already_favorite())
        <form  action="{{ route('favorites.destroy',['post_id' => $post->id,'favorite'=>$post->get_favorite_id()]) }}" method="post">
            @method('DELETE')
            @csrf
            <input class="favorite_button" type="image" src="{{asset('SystemImage/already_favorite.png')}}" value="いいね削除">
            <p class="favorite_comment">いいね解除</p>
        </form>
        @else
        <form action="{{ route('favorites.store',['post_id' => $post->id]) }}" method="post">
            @csrf
            <input class="favorite_button" src="{{asset('SystemImage/favorite.png')}}" type="image" value="いいね" >
            <p class="favorite_comment">いいね!</p>
        </form>
        @endif
    </article>
    <article class="post_detail_comment">
        <p>{{ $post['comment'] }}</p>
    </article>
    <article class="replies">
        <h2 class="replies_index">コメント一覧</h2>
        @foreach ($post->replies()->get() as $reply)
        <section class="reply">
            <div class="reply_container">
                @if ($reply->user->image ==  "user_no_image.png")
                <img class="reply_user_image" src="{{ asset('/SystemImage/user_no_image.png') }}">
                @else
                    @if(app()->environment('production'))
                    <img class="reply_user_image" src="{{config('app.AWS_URL')}}/UserImage/{{$reply->user->image}}">
                    @elseif (app()->environment('local'))
                    <img class="reply_user_image" src="{{ asset('/UserImage/'.$reply->user->image) }}">
                    @endif
                @endif
                <p class="reply_user_name">{{ $reply->user->name }}</p>
                <p class="reply_created_at">投稿日:{{ $reply->created_at }}</p>
            </div>
            <p class="reply_comment">{{ $reply->comment }}</p>
        </section>
        @endforeach
    </article>
    <article class="post_comment">
        <form action="{{ route('comments.store',['post_id' => $post->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="post_comment_index">コメントする</h2>
            <textarea class="post_comment_area" name="reply" rows="4" cols="40"></textarea>
            <input type="submit" value="コメント" >
        </form>
    </article>
</main>
@endsection
