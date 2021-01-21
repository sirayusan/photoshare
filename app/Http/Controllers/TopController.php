<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TopController extends Controller
{
    public function index()
    {
        $post = new Post();

        $posts = $post->all();

        return view('top',compact('posts'));
    }
}
