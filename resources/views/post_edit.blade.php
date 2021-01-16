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
    <form action="{{ route('posts.update',['post'=>$post->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <dt><label for="title">タイトル</label></dt>
        <dd><input name="title" rows="4" cols="40" value="{{ $post->title }}"></dd>
        <dt><label for="tags">タグ</label></dt>
        <dd><input name="tags" rows="4" cols="40"
            value="@foreach($post->tags as $cnt => $tag)@if($post->tags->count()-1 !== $cnt){{$tag->tag}},@else{{$tag->tag}}@endif
@endforeach"></dd>
        <p>画像</p>
        @if ($post->image ==  "no_image.png")
        <p><img class="image-output" src="{{ asset('/SystemImage/no_image.png') }}" width="80px"></p>
        @else
        <p><img class="image-output" src="{{ asset("/PostImage/$post->image") }}" width="80px"></p>
        @endif
        <label>
            <input type="file" id="image" name="image" accept="image/*" class="image" >
        </label>
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
        <input type="hidden" id="cropImage" name="image" value="" />
        <p>投稿内容</p>
        <input type="text" name="comment" value="{{ $post->comment }}">
        <input type="submit" name="" value="編集完了">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
        <script src="{{ asset('/js/post_crop.js') }}"></script>
    </form>
</body>
</html>
