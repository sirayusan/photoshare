<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TopController extends Controller
{
    public function index()
    {
        $md = new Post();

        $posts = $md->all();

        return view('top',compact('posts'));
    }
}
