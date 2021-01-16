<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function replies()
    {
           return $this->hasMany('App\Models\Reply');
    }

    public function already_favorite()
    {
        return Favorite::where('post_id', $this->id)->where('user_id',Auth::id())->exists();
    }

    public function get_favorite_id()
    {
        return Favorite::where('post_id', $this->id)->where('user_id',Auth::id())->first()->id;
    }

    public function tags() {
        return $this->hasMany('App\Models\Tag');
    }
}
