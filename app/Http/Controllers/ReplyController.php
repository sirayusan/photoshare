<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Post;
use App\Models\Follow;
use Auth;

class ReplyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reply' => ['required', 'max:255'],
        ]);

        if (Auth::check() === false) {
            return view('auth/login');
        }

        $reply = new Reply();
        $reply->comment = $validatedData['reply'];
        $reply->user_id = Auth::id();
        $reply->post_id = $request->post_id;
        $reply->save();

        return redirect('top');
    }
}
