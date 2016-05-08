<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $guard = 'admin';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout','logOut']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user' => 'required|max:255',
            
        ]);
    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        if ($request->input('user')) {
            if (($user = User::whereUser($request->input('user'))->first()) != null) {
                Auth::login($user, true);
                //return response()->json($user);
                 return redirect('/home');
            }
        }
        
        return redirect('/login');
        
    }

    public function create(array $data)
    {
        return User::create([
            'user' => bcrypt($data['user']),
        ]);
    }

    public function logOut() {
        Auth::logout();
        return redirect('/');

    }
}
