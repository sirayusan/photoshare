<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Post;
use Auth;

class FavoriteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        if (Auth::check() === false) {
            return view('auth/login');
        }

        $favorite = new Favorite;
        $favorite->user_id = Auth::id();
        $favorite->post_id = $id;
        $favorite->save();

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
        Favorite::where('post_id',$id)->where('user_id',Auth::id())->delete();
        return redirect()->back();
    }
}
