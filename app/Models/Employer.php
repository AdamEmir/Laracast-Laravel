<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

//    hierarchy([
//        Parent => Employer::class,
//        Child => Job::class,])
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
