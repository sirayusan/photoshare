<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\User;
use Auth;

class FollowController extends Controller
{
    public function post_index()
    {
        $user = User::find(Auth::id());
        return view('follow_post',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         if ($request->follow_user_id == Auth::id())
         {
             return back()->with('error', '自分自身をフォローすることはできません');
         }
         $follow = new Follow;
         //フォローする側
         $follow->user_id = Auth::id();
         //フォローされる側
         $follow->follow_user_id = $request->follow_user_id;
         $follow->save();
         return redirect()->back();
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Follow::where('follow_user_id',$id)->where('user_id',Auth::id())->delete();
        return redirect()->back();
    }
}
