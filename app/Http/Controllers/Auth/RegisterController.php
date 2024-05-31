<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\UserRegisterMail; 
use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = 'pricing';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['type'] == 2) {
            $validationRules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phone' => ['required','numeric','regex:/^([0-9\s\-\+\(\)]*)$/'],
                'company_website' => ['required'],
                'company_profile' => ['required','string','max:300'],
                'company_name' => ['required', 'string', 'max:255'],
                'country_id' => ['required'],
                'category_ids' => ['required'],
            ];
        
            // Conditionally set the certifications rule
            $validationRules['certifications'] = isset($data['certifications']) ? ['required'] : [];
        
            // Example for additional conditional rules
            if (isset($data['event_name'])) {
                $validationRules['event_name'] = ['required', 'string', 'max:255'];
            }
        
            if (isset($data['location'])) {
                $validationRules['location'] = ['required', 'string', 'max:255'];
            }
        
            if (isset($data['industry'])) {
                $validationRules['industry'] = ['required'];
            }
        
            if (isset($data['education_level'])) {
                $validationRules['education_level'] = ['required'];
            }
        
            if (isset($data['position_type'])) {
                $validationRules['position_type'] = ['required'];
            }
        
            if (isset($data['experience_level'])) {
                $validationRules['experience_level'] = ['required'];
            }
        
            if (isset($data['position_title'])) {
                $validationRules['position_title'] = ['required', 'string', 'max:255'];
            }
            return Validator::make($data, $validationRules);

        }else{
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phone' => ['required','numeric'],
            ]);
        }
    }
 
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if($data['type'] == 2){
            // dd("2");
           
            $user = User::create([
                'name' => $data['name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'company_name' => $data['company_name'],
                'password' => Hash::make($data['password']),
                'type' => $data['type'],
                'phone' => $data['phone'],
                'company_website' => $data['company_website'],
                'company_profile' => $data['company_profile'],
                'country_id' => implode(',', $data['country_id']),
                'category_ids' => implode(',', $data['category_ids']),
                'linkedin_profile' => $data['linkedin_profile'],
                'twiter_profile' => $data['twiter_profile'],
                'representatives' => $data['representatives'],
                'certifications' => isset($data['certifications']) ? implode(',', $data['certifications']) : null,
                'event_name' => $data['event_name'] ?? null,
                'start_date' => $data['start_date'] ?? null,
                'end_date' => $data['end_date'] ?? null,
                'location' => $data['location'] ?? null,
                'agenda' => $data['agenda'] ?? null,

                'education_level' => $data['education_level'] ?? null,
                'position_type' => $data['position_type'] ?? null,
                'experience_level' => $data['experience_level'] ?? null,
                'position_title' => $data['position_title'] ?? null,
                'industry' => $data['industry'] ?? null,
            ]);
           $note =  Notification::create([
                'user_id' =>  $user->id,
                'notification' => 'A new user '.$user->name.' has been registered.',
                'status' => 0 ,
                'type' => 'user',
                'read' => 0,
                'notification_for' => $user->id
            ]);
            Mail::to($user->email)->send(new UserRegisterMail($data));
            return $user;
        }else{
            // dd("0");
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'type' => $data['type'],
                'phone' => $data['phone']
            ]);
        }
    }

    protected function redirectTo()
    {
        if (auth()->user()->type == "partner") {
            return 'pricings';
        }
        return 'home';
    }
    
        
}
