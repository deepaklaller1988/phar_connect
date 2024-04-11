<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','images','category_id','partner_id',
    'key_services','description','contact_info','email','time','status'];

    public function user()
    {
        return $this->belongsTo(User::class,'partner_id'); 
    }
}
