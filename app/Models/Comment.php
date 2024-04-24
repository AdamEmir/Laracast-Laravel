<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['title','body'];

//    hierarchy([
//        Parent => Post::class,
//        Child => Comment::class,])
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
