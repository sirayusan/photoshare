@extends('layouts/app')
@section('style')
<!-- モーダル表示用bootstrap読み込み -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/croppie.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/mycrop.css') }}">
@show
@section('body')
<div class="wrap"></div>
<!-- gloval_fixed_menuの初位置を確保すためのタグ -->
<main class="post_create">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <article class="">
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <section>
                <div class="post_title_block">
                    <label class="post_title" for="title">タイトル</label>
                    <p class="post_title_input_caution">※入力必須</p>
                </div>
                <div class="post_title_block">
                    <div class="line_Darkblue post_title_line"></div>
                    <input class="post_title_input_field" name="title" rows="4" cols="40">
                </div>
            </section>
            <section class="post_tag_container">
                <label class="post_tag_index" for="tags">タグ</label>
                <input class="post_tag_input_field" name="tags" rows="4" cols="40">
                <div class="bubble1">タグ1,タグ2のように , で区切って入力してください</div>
            </section>
            <section>
                <div id="input-form">
                    <label>
                        <span class="filelabel" title="画像を選択">
                            <img class="image-output post_input_image" src="{{ asset('/SystemImage/no_image.png') }}">
                        </span>
                        <input type="file" id="image" name="image" accept="image/*" class="image" >
                    </label>
                    <!-- モーダル本体 -->
                    <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog post_modal_dialog" role="document">
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
            </section>
            <section class="post_create_comment">
                <label class="post_create_comment_index" for="comment">コメント</label>
                <textarea class="post_input_comment" name="comment" rows="4" cols="40"></textarea>
            </section>
            <input type="hidden" id="cropImage" name="image" value="" />
            <input class="profile_create_complete" type="submit" name="action" value="投稿">
            <!-- <button type="submit" name="action" value="send">投稿</button> -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
            <script src="{{ asset('/js/post_crop.js') }}"></script>
        </form>
    </article>
</main>
@endsection
