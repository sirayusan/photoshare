<header>
    <div class="gloval_fixed_menu">
        <div class="gloval_fixed_menu_inner">
            <a href="{{ route('index') }}">photoshare</a>
            <form class="form-box" action="{{ route('tag_search.index') }}" method="get">
                <input classclass="form-input" type="text" name="tags">
                <button class="form-button"><img src="{{asset('/SystemImage/top_search_icon.png')}}" width="20px" height="20px"></button>
            </form>
            <!--ここからメニュー-->
            <div class="menue_container">
                <input type="checkbox" id="menu-btn-check">
                <label for="menu-btn-check" class="menu-btn"><span></span></label>
                <div class="menu-content">
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
