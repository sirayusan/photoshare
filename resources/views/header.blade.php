<header>
    <div class="gloval-fixed-menu">
        <div class="gloval-fixed-menu___inner">
            <a href="{{ route('index') }}">photoshare</a>
            <form class="form-box" action="{{ route('tag_search.index') }}" method="get">
                <input classclass="form-input" type="text" name="tags">
                <button class="form-button"><img src="{{asset('/SystemImage/top_search_icon.png')}}" width="20px" height="20px"></button>
            </form>
            <!--ここからメニュー-->
            <div class="gloval-fixed-menu__container">
                <input type="checkbox" id="gloval-fixed-menu__btn-check">
                <label for="gloval-fixed-menu__btn-check" class="gloval-fixed-menu__btn"><span></span></label>
                <div class="gloval-fixed-menu__content">
                    <ul>
                        @if (Auth::check() === true)
                        <li>
                            <a href="{{ route('users.show',['user'=>Auth::user()]) }}">プロフィール</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <input class="menu_logout_btn" type="submit" name="" value="ログアウト">
                            </form>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('login') }}">ログイン</a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('posts.create') }}">投稿する</a>
                        </li>
                    </ul>
                </div>
                <!--ここまでメニュー-->
            </div>
        </div>
    </div>
</header>
<!-- gloval-fixed-menu__の初位置を確保すためのタグ -->
<div class="wrap"></div>
