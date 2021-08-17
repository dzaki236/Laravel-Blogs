<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user','id_post','comments'];

    protected $with = ['posts','users'];

    public function posts()
    {
        # code...
        return $this->belongsTo(Post::class,'id_post');
    }
    public function users()
    {
        # code...
        return $this->belongsTo(User::class,'user');
    }
}
