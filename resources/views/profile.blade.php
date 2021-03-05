@extends('layouts/app')
@section('style')
<!-- モーダル表示用bootstrap読み込み -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/mycrop.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/croppie.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/icon_croppie.css') }}">
@show
@section('body')
<!-- gloval_fixed_menuの初位置を確保すためのタグ -->
<div class="wrap"></div>
<form action="{{ route('users.update',['user'=>Auth::id()]) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="profile_container">
        <div id="input-form">
            <div id="image-area">
                <label>
                    <span class="filelabel" title="画像を選択">
                        <img class="profile_edit_image" src="{{ asset('/SystemImage/photo_edit.png') }}">
                        @if ($user->image ==  "user_no_image.png")
                        <img class="iconImage" src="{{ asset('/SystemImage/user_no_image.png') }}">
                        @else
                        <div id="image-style">
                            @if(app()->environment('production'))
                            <img class="iconImage" src="{{config('AWS_URL')}}/UserImage/{{$user->image}}">
                            @elseif (app()->environment('local'))
                            <img class="iconImage" src="{{ asset("/UserImage/$user->image") }}">
                            @endif
                        </div>
                        @endif
                    </span>
                    <input type="file" id="image" name="image" accept="image/*" class="image" >
                </label>
            </div>
            <!-- モーダル本体 -->
            <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div id="upload-demo" class="center-block"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="modal-btn-cancel" data-dismiss="modal">キャンセル</button>
                            <button type="button" id="cropImageBtn" class="modal-bton-crop">決定</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile_description_block">
            <input type="hidden" id="cropImage" name="image" value="" />
            <input class="profile_name" type="text" name="name" value="{{ $user->name }}">
            <p>メールアドレス    一部のみ表示しています。</p>
            <p>{{ substr($user->email, 0, 4)."***@****" }}</p>
        </div>
        <div class="profile_comment_block">
            <label for="comment">自己紹介</label>
            <textarea class="profile_comment" name="comment">{{ $user->comment }}</textarea>
            <input class="profile_edit_complete" type="submit" value="変更保存">
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
        <script src="{{ asset('/js/icon_crop.js') }}"></script>
    </div>
</form>
<div class="follow_follower_index">
    <input id="all" type="radio" name="tab_item" checked>
    <label class="tab_item" for="all">{{ $user->follows->count() }}フォロー</label>
    <input id="programming" type="radio" name="tab_item">
    <label class="tab_item" for="programming">{{ $user->followers->count() }}フォロワー</label>
    <div class="tab_content" id="all_content">
        <div class="tab_content_description">
            @foreach($user->follows as $follow)
            <div class="user_block">
                @if ($follow->follow_user->image ==  "user_no_image.png")
                <img class="user_image" src="{{ asset('/SystemImage/user_no_image.png') }}">
                @else
                    @if(app()->environment('production'))
                    <img class="user_image" src="{{config('AWS_URL')}}/UserImage/{{$follow->follow_user->image}}">
                    @elseif (app()->environment('local'))
                    <img class="user_image" src="{{ asset("/PostImage/$follow->follow_user->image") }}">
                    @endif
                @endif
                <div class="user_discription">
                    <p class="user_name">{{ $follow->follow_user->name  }}</p>
                    @if (strlen($follow->follow_user->comment) <= 150)
                    <p>{{ mb_strimwidth( $follow->follow_user->comment,0,150) }}</p>
                    @else
                    <p>{{ mb_strimwidth( $follow->follow_user->comment,0,140) }}.....</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="tab_content" id="programming_content">
        <div class="tab_content_description">
            @foreach($user->followers as $follower)
            <div class="user_block">
                @if ($follower->user->image ==  "user_no_image.png")
                <img class="user_image" src="{{ asset('/SystemImage/user_no_image.png') }}" width="80px">
                @else
                    @if(app()->environment('production'))
                        <img class="user_image" src="{{config('AWS_URL')}}/UserImage/{{$follow->user->image}}" width="80px">
                    @elseif (app()->environment('local'))
                        <img class="user_image" src="{{ asset("/PostImage/$follow->user->image") }}" width="80px">
                    @endif
                @endif
                <div class="user_discription">
                    <p class="user_name">{{ $follower->user->name  }}</p>
                    <p>{{ $follower->user->comment  }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<h1 class="line_Darkblue profile_index">投稿一覧</h1>
<div class="posts">
    @foreach ($user->posts as $post)
    <div class="post">
        <a href="{{ route('posts.show',['post' => $post->id]) }}">
            @if ($post->image ==  "no_image.png")
            <img class="post_img" src="{{ asset('/SystemImage/no_image.png') }}">
            @else
                @if(app()->environment('production'))
                <img class="post_img" src="{{config('app.AWS_URL')}}/PostImage/{{ $post->image }}">
                @elseif (app()->environment('local'))
                <img class="post_img" src="{{ asset("/PostImage/$post->image") }}">
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
                <img class="post_icon_Image" src="{{config('AWS_URL')}}/UserImage/{{$post->user->image}}">
                @elseif (app()->environment('local'))
                <img class="post_icon_Image" src="{{ asset('/UserImage/'.$post->user->image) }}">
                @endif
            @endif
            <p>{{ mb_strimwidth($post->user->name,0,28) }}</p>
        </div>
        <div class="post_edit_block">
            <form action="{{ route('posts.destroy',['post'=>$post->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <input class="profile_posts_edit_button" type="submit" value="削除">
            </form>
            <form action="{{ route('posts.edit',['post'=>$post->id]) }}" method="get">
                <input class="profile_posts_edit_button" type="submit" value="編集">
            </form>
        </div>
    </div>
    @endforeach
</div>
<h1 class="line_Darkblue profile_index">新着</h1>
<div class="new_posts_container">
    @foreach ($user->follow_user_posts->take(6) as $post)
    <div class="new_post_block">
        <p>フォロ－している
        @if ($post->user->image ==  "user_no_image.png")
        <img class="new_post_image" src="{{ asset('/SystemImage/user_no_image.png') }}">
        @else
            @if(app()->environment('production'))
            <img class="post_icon_Image" src="{{config('AWS_URL')}}/UserImage/{{$post->user->image}}">
            @elseif (app()->environment('local'))
            <img class="post_icon_Image" src="{{ asset('/UserImage/'.$post->user->image) }}">
            @endif
        @endif
        {{ $post->user->name }}さんが「<a href="{{ route('posts.show',['post' => $post->id]) }}">{{ $post->title }}</a>」を投稿しました！</p>
    </div>
    @endforeach
    <a href="{{ route('follow.post_index') }}">もっとみる</a>
    @endsection
</div>
