<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Post;

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
        if (isset($request->tags))
        {
            $substitute_tags = array_unique(explode(',',str_replace('，',',',$request->tags)));
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
        }else{
            $posts = Post::all();
            $comment = "入力がなかったため全数表示しています。";
            return view('tag_search',compact('posts','comment'));
        }
    }
}
