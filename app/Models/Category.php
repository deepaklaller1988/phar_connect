<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title','status','image','parent_id','description'];

    // public function children()
    // {
    //     return $this->hasMany(Category::class, 'parent_id', 'id');
    // }

    // public function parent()
    // {
    //     return $this->belongsTo(Category::class, 'parent_id', 'id');
    // }

    // public function descendants()
    // {
    //     return $this->children()->with('descendants');
    // }
}
