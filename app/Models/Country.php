<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function countries()
    {
        return $this->belongsToMany('App\Models\Country','id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
