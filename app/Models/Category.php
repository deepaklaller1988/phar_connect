<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title','status','image','parent_id','description'];

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }
}
