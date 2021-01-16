<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    * タグ検索欄の値を展開しタグインスタンスを取得して更に展開して投稿を取得する。
    */
    public function index(Request $request)
    {
        $substitute_tags = explode(',',str_replace('，',',',$request->tags));
        $tags = Tag::wherein('tag',$substitute_tags)->get();
        foreach ($tags as $tag)
        {
            foreach ($tag->posts as $post)
            {
                $posts[] = $post;
            }
        }
        $posts = array_unique($posts);
        return view('tag_search',compact('posts'));
    }
}
