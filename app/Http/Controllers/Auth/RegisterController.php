<?php

namespace App\Http\Controllers\Auth;
use Mail;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
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

    protected $redirectTo='/registration-successful';

    use RegistersUsers;
    use VerifiesUsers;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getVerification', 'getVerificationError']]);
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
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
       // $this->guard()->login($user); -->AUTO LOG IN AFTER REGISTRATION

        UserVerification::generate($user);
        UserVerification::sendQueue($user, 'Verifikujte Vas Nalog'); //naslov mejla

        ($this)->redirectTo = "/registration-successful?user_id=$user->id"; //OVDE MENJAM REDIRECT TO ATRIBUT KLASE, saljem user-a zbog resend MAIL-a

        return redirect($this->redirectPath());
    }

    //moja funkcija
    public function registrationSuccessful(Request $request){
        $user_id = $request->query('user_id');
        return view('verify-email-page',compact('user_id'));
    }

    public function resendEmailVerification(){

        $user_id = $_GET['user_id'];
        $user = User::find($user_id);
        UserVerification::sendQueue($user, 'Verifikujte Vas Nalog'); //naslov mejla
        return "Mejl je ponovo poslat.";

    }

}