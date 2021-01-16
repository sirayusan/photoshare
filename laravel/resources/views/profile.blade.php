<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>トップページ</title>
    <!-- スタイルを明示的にすべてリセットする -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" />
    <!-- スタイル指定 -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- モーダル表示用bootstrap読み込み -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/mycrop.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/croppie.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/icon_croppie.css') }}">
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
    <h1>プロフィール</h1>
    <a href="{{ route('posts.create') }}">投稿する</a>
    <br>
    <a href="{{ route('top.index') }}">トップへ</a>
    <form action="/users" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div>
            <br>
            <p>アイコン</p>
            @if ($user->image ==  "no_image.png")
                <p><img class="iconImage" src="{{ asset('/SystemImage/no_image.png') }}" width="80px"></p>
            @else
            <div id="image-style">
                <p><img class="iconImage" src="{{ asset("/UserImage/$user->image") }}" width="80px"></p>
            </div>
            @endif
            <br>
            <label for="image">画像変更</label>
            <div id="input-form">
                <div id="image-area">
                    <label>
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
            <input type="hidden" id="cropImage" name="image" value="" />
        </div>
        <br>
        <label for="name">名前</label>
        <input type="text" name="name" value="{{ $user->name }}">
        <br>
        <p>メールアドレス    一部のみ表示しています。</p>
        <p>{{ substr($user->email, 0, 4)."***@****" }}</p>
        <br>
        <p>自己紹介文</p>
        <input type="text" name="comment" value="{{ $user->comment }}">
        <br>
        <input type="submit" value="送信">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
        <script src="{{ asset('/js/icon_crop.js') }}"></script>
    </form>
    <div >
        <p>フォロー一覧</p>
        <p>フォロー数{{ $user->follows->count() }}</p>
        @foreach($user->follows as $follow)
            <div class="user">
                @if ($follow->follow_user->image ==  "no_image.png")
                    <p><img src="{{ asset('/SystemImage/no_image.png') }}" width="80px"></p>
                @else
                    <p><img src="{{ asset("/PostImage/$follow->follow_user->image") }}" width="80px"></p>
                @endif
                <p>{{ $follow->follow_user->name  }}</p>
                <p>{{ $follow->follow_user->comment  }}</p>
            </div>
        @endforeach
        <p>フォロワー一覧</p>
        <p>フォロワー数{{ $user->followers->count() }}</p>
        @foreach($user->followers as $follower)
            <div class="user">
                @if ($follower->user->image ==  "no_image.png")
                    <p><img src="{{ asset('/SystemImage/no_image.png') }}" width="80px"></p>
                @else
                    <p><img src="{{ asset("/PostImage/$follow->user->image") }}" width="80px"></p>
                @endif
                <p>{{ $follower->user->name  }}</p>
                <p>{{ $follower->user->comment  }}</p>
            </div>
        @endforeach
    </div>
    <div>
    <p>投稿一覧</p>
    @foreach ($user->posts as $post)
      <div class="user">
        <p>投稿内容</p>
        <p>{{ $post->comment }}</p>
        @if ($post->image ==  "no_image.png")
        <p><img src="{{ asset('/SystemImage/no_image.png') }}" width="80px"></p>
        @else
        <p><img src="{{ asset("/PostImage/$post->image") }}" width="80px"></p>
        @endif
        <form action="{{ route('posts.destroy',['post'=>$post->id]) }}" method="post">
          @method('DELETE')
          @csrf
          <input type="submit" value="削除">
        </form>
        <form action="{{ route('posts.edit',['post'=>$post->id]) }}" method="get">
          <input type="submit" value="編集">
        </form>
      </div>
    @endforeach
    </div>
    <br>
    <p>新着</p>
    <div>
        @foreach ($user->follow_user_posts->take(6) as $post)
        <br>
        <p>フォロ－している
            @if ($post->user->image ==  "no_image.png")
                <p><img src="{{ asset('/SystemImage/no_image.png') }}" width="80px"></p>
            @else
                <p><img src="{{ asset("/PostImage/$post->user->image") }}" width="80px"></p>
            @endif
            {{ $post->user->name }}さんが「<a href="{{ route('comments.index',['post_id' => $post->id]) }}">{{ $post->title }}</a>」を投稿しました！</p>
            @endforeach
        <a href="{{ route('follow.post_index') }}">もっとみる</a>
    </div>
  </body>
</html>
