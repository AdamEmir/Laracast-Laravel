<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job extends Model{

    use HasFactory;

    protected $table = 'job_listings';
    //assign variable that can be mass assigned
//    protected $fillable = ['title', 'salary', 'employer_id'];
    //assign variable not to be mass assigned
    protected $guarded = [];

//    hierarchy([
//        Parent => Job::class,
//        Child => Employer::class,])
    public function employer(){
        return $this->belongsTo(Employer::class);
    }

//    hierarchy([
//        Parent => Tag::class,
//        Child => Job::class,])
//    pivot table job_tag
    public function tags(){
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
}
