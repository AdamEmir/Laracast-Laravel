<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];

//    hierarchy([
//        Parent => Post::class,
//        Child => Comment::class,])
    public function comments(){
        return $this->hasMany(Comment::class);
    }

//    hierarchy([
//        Parent => User::class,
//        Child => Post::class,])
    public function user(){
        return $this->belongsTo(User::class);
    }

//    hierarchy([
//        Parent => Tag::class,
//        Child => Post::class,])
//    pivot table post_tag
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
