<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Follow extends Model
{
    use HasFactory;
    protected $table = 'follows';

    public function get_follow_id($id)
    {
        return Follow::where('follow_user_id',$id)->where('user_id',Auth::id())->first()->follow_user_id;
    }

    public function already_follow($follow_user_id)
    {
        return Follow::where('follow_user_id',$follow_user_id)->where('user_id',Auth::id())->exists();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function follow_user()
    {
        return $this->belongsTo('App\Models\User','follow_user_id');
    }
}
