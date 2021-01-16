
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
    <div class="wrap"></div>
    <!-- gloval_fixed_menuの初位置を確保すためのタグ -->
    <h1>投稿</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <dt><label for="title">タイトル</label></dt>
        <dd><input name="title" rows="4" cols="40"></dd>
        <dt><label for="tags">タグ</label></dt>
        <dd><input name="tags" rows="4" cols="40"></dd>
        <div class="bubble1">タグ1,タグ2のように入力してください</div>
        <div id="input-form">
            <div id="image-area">
                <div id="image-style">
                    <img class="image-output" src="{{ asset('SystemImage/no_image.png')}}" alt="投稿画像">
                </div>
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
            <dt><label for="comment">コメント</label></dt>
            <dd><textarea name="comment" rows="4" cols="40"></textarea></dd>
        </div>
        <input type="hidden" id="cropImage" name="image" value="" />
        <button type="submit" name="action" value="send">送信</button>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
    <script src="{{ asset('/js/post_crop.js') }}"></script>
    </form>
    <a href="{{ route('top.index') }}">トップへ</a>
    <br>
</body>
</html>
