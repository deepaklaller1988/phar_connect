<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','images','category_id','partner_id',
    'key_services','description','contact_info','email','time','status','parent_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'partner_id'); 
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id'); 
    }

    public function countrie()
    {
        return $this->belongsTo(Country::class,'country');
    }

    public function parent_category()
    {
        return $this->belongsTo(Category::class,'parent_id'); 
    }

    public function zones()
    {
        return $this->belongsTo(Authorityregion::class,'zone');
    }
}
