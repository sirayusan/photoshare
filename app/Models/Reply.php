<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\PostController;
use Illuminate\Database\Eloquent\Model;
class Reply extends Model
{
    use HasFactory;
    protected $table = 'replies';

    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
