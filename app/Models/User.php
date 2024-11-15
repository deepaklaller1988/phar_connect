<?php
  
namespace App\Models;
  
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
  
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'phone','company_website','company_profile','location','key_services','certifications','country_id','created_at',
        'plan_id','plan_status','company_name','category_idss',
        'last_name',
        'event_name',
        'start_date',
        'end_date',
        'education_level',
        'position_type',
        'experience_level',
        'position_title',
        'representatives',
        'industry',
        'linkedin_profile',
        'twiter_profile',
        'event_name',
        'start_date',
        'end_date',
        'agenda',
        'logo',
        'alternate_contact_name',
        'alternate_email_address',
        
    ];
  
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array

     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    /**
     * The attributes that should be cast.
     *
     * @var array

     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 
    /** 
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            fn ($value) =>  ["user", "admin", "partner"][$value],
        );
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'partner_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // In your Product model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_ids');
    }


    
    // public function isPlanExpired()
    // {
    //     // Assuming you have a column 'expiry_date' in the plans table
    
    //     return now()->greaterThan($this->plan->created_at->addDays($this->plan->days));
    // }

    public function isPlanExpired()
     {
    if ($this->plan && $this->plan->created_at) {
        return now()->greaterThan($this->plan->created_at->addDays($this->plan->days));
    }
    
    // Handle the case where $this->plan or $this->plan->created_at is null
    return false;
     }

}   