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
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = 'pricing';
    // protected $redirectTo = '/home';
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
        // dd($data);
        if ($data['type'] == 2) {
            $validationRules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phone' => ['required','numeric','regex:/^([0-9\s\-\+\(\)]*)$/'],
                'company_name' => ['required', 'string', 'max:255'],
                'alternate_contact_name' => ['required', 'string', 'max:255'],
                'alternate_email_address' => ['required', 'string', 'email', 'max:255'],
            ];
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
            $user = User::create([
                'name' => $data['name'].' '.$data['last_name'],
                'email' => $data['email'],
                'company_name' => $data['company_name'],
                'password' => Hash::make($data['password']),
                'type' => $data['type'],
                'phone' => $data['phone'],
                'alternate_contact_name' => $data['alternate_contact_name'],
                'alternate_email_address' => $data['alternate_email_address']
            ]);
           $note =  Notification::create([
                'user_id' =>  $user->id,
                'notification' => 'A new user '.$user->name.' has been registered.',
                'status' => 0 ,
                'type' => 'user',
                'read' => 0,
                'notification_for' => $user->id
            ]);
            // Mail::to($user->email)->send(new UserRegisterMail($data));
            session()->flash('reg_success', 'Registration successful!');
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
        // Get the authenticated user
        $user = Auth::user();
        if ($user->type == '1') {
           
            return '/admin/dashboard';
        } elseif ($user->type == 'partner') {
        
            return '/pricings';
        }else{
            return '/home';
        }
    }
}
