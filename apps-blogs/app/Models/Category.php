<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['code_categories','categories'];
    public function hasmanypost()
    {
        # code...
        return $this->hasMany(Post::class,'id_categories');
    }
}
