<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['id_user','title','image','content','id_categories'];
    protected $with = ['creator','category'];
    protected $dates = ['deleted_at'];
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
