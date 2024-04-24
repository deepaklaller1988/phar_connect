<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['user_id','status','amount','transaction_id','mode','category_id','plan_id'];

    public function usernote()
    {
        return $this->belongsTo(User::class,'user_id'); 
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class,'plan_id');
    }


}
