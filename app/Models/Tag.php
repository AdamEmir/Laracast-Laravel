<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

//    hierarchy([
//        Parent => Job::class,
//        Child => Tag::class,])
//    pivot table job_tag
    public function jobs(){
        return $this->belongsToMany(Job::class, relatedPivotKey: 'job_listing_id');
    }

//    hierarchy([
//        Parent => Post::class,
//        Child => Tag::class,])
//    pivot table post_tag
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
