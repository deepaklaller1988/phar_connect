<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // dd(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])));
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            // dd(auth()->user()->type);
            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.dashboard');
            }elseif (auth()->user()->type == 'partner') {
                if (auth()->user()->plan_id) {
                    return redirect()->route('partner.dashboard');
                } else {
                    return redirect()->route('pricings');
                }
            }else{
                return redirect()->route('/home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Credentials do not match');
        }
          
    }

    protected function authenticated($request,$user){
        if($user->type === 'admin'){
            return redirect()->intended('admin.dashboard'); //redirect to admin panel
        }elseif($user->type === 'partner'){
            return redirect()->intended('partner.dashboard');
        }
    
        return redirect()->intended('/'); //redirect to standard user homepage
    }
}
