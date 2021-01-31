@section('head')
<div class="gloval_fixed_menu">
    <div class="gloval_fixed_menu_inner">
        <a href="{{ route('top.index') }}">photoshare</a>
        <form class="form-box" action="{{ route('tag_search.index') }}" method="get">
            <input classclass="form-input" type="text" name="tags">
            <button class="form-button"><img src="{{asset('/SystemImage/top_search_icon.png')}}" width="20px" height="20px"></button>
        </form>
    </div>
    <input type="checkbox" id="menu-btn-check">
    <label for="menu-btn-check" class="menu-btn"><span></span></label>
    <!--ここからメニュー-->
    <div class="menu-content">
        <ul>
            <li>
                <a href="{{ route('top.index') }}">topページ</a>
            </li>
            <li>
                @if (Auth::check() === true)
                <a href="{{ route('users.show',['user'=>Auth::user()]) }}">プロフィール</a>
                @else
                <a href="{{ route('login') }}">ログイン</a>
                @endif
            </li>
            <li>
            </li>
            <li>
                <a href="{{ route('login') }}">投稿する</a>
            </li>
        </ul>
    </div>
    <!--ここまでメニュー-->
</div>
@endsection
