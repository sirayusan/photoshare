<?php
namespace App\Http\Controllers;

use App\Http\Requests\ValidateController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Str;
use File;

class UserController extends Controller
{
    //ログアウト
    public function user_logout() {
       return Auth::logout();
    }

    public function __construct(){
        $this->middleware('auth');
    }

    public function show($id)
    {
        if (Auth::check() === false )
        {
            return redirect('top');
        }
        $user = User::Find($id);
        return view('profile',compact('user',));
    }

    //ユーザー情報変更(画像・ユーザー名・自己紹介文)
    public function store(ValidateController $request)
    {
        $user = Auth::user();
        $user->name = $request['name'];
        $user->comment = $request['comment'];

        //画像はbase64で受け取っている。
        if(strpos($request->image,'data:image/png;base64') !== false && isset($request->image))
        {
            $image = base64_decode(str_replace(' ', '+',str_replace('data:image/png;base64,', '', $request->image)));
            $user->image = hash('sha256',Str::random(20).time()).'.'.'png';
            File::put(storage_path('app/public/image/UserImage'). '/' . $user->image, $image);
        }else{
            return back()->with('error', '選択できるのは画像のみです。');
        }

        $user->update();

        return redirect()->back();
    }
}
