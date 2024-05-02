<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','images','category_id','partner_id',
    'key_services','description','contact_info','email','time','status','parent_id','slug'];

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

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    public function education(){
        return $this->hasMany(Education::class,'id','education_level');
    }

    public function experience(){
        return $this->hasMany(Experience::class,'id','experience_level');
    }   

    public function position(){
        return $this->hasMany(Position::class,'id','position_type');
    }

    public function views()
    {
        return $this->hasMany(PostView::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
            $originalSlug = $post->slug;
            $count = 1;

            // Check if the slug already exists
            while (static::whereSlug($post->slug)->exists()) {
                $post->slug = $originalSlug . '-' . $count;
                $count++;
            }
        });
    }
}
