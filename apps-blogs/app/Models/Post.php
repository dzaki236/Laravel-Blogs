<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id_user','title','image','content','archive','id_categories'];
    protected $with = ['creator','category'];
    public function creator()
    {
        # code...
        return $this->belongsTo(User::class,'id_user','id');
    }
    public function category()
    {
        # code...
        return $this->belongsTo(Category::class,'id_categories','id');
    }
    public function manycomments()
    {
        # code...
        return $this->hasMany(Comment::class,'id_post');
    }
}
