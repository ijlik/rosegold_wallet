<?php

namespace App\Http\Controllers\Auth;

use App\Balance;
use App\Message;
use App\User;
use App\Http\Controllers\Controller;
use App\Wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use SendGrid\Mail\Mail;

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
    protected $redirectTo = '/home';

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
    protected function register(Request $request)
    {
        /** @var User $user */
        $request->validate([
            'username' => 'required|string|min:6|max:255|regex:/^[\w-]*$/|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $validatedData = $request->all();

        try {
            $eth = generateNewAddress();
            $validatedData['password']        = bcrypt(array_get($validatedData, 'password'));
//            $validatedData['activation_code'] = str_random(30).time();
//            $validatedData['activation_code'] = null;
            $validatedData['status']          = 1;
            $validatedData['role']            = 0;
            $validatedData['address']         = $eth['address'];
            $validatedData['priv_key']        = $eth['privateKey'];
            $user                             = app(User::class)->create($validatedData);

            $message = new Message();
            $message->user_id = $user->id;
            $message->from = 'RoseWallet';
            $message->content = "Hello ".$user->username.", welcome to RoseWallet.<br>Please only use this message function if you have problems or questions directly related to the site.<br>Also many questions are already answered on the FAQ Page.<br><br>";
            $message->save();
        } catch (\Exception $exception) {
            logger()->error($exception);
            return redirect()->back()->withErrors('Unable to create new user');

        }
//        auth()->login($user);
        return redirect()->back()->with([
            'message' => "Successfully created a new account. Please login to continue",
            'type' =>'success'
        ]);
//        return redirect()->to('/home');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function activateUser($activationCode)
    {
        try {
            $user = app(User::class)->where('activation_code', $activationCode)->first();
            if (!$user) {
                return view('auth.login',[
                    'message' => "The code does not exist for any user in our system.",
                    'type' => 'error'
                ]);
            }
            $user->status          = 1;
            $user->activation_code = null;
            $user->save();
        } catch (\Exception $exception) {
            logger()->error($exception);
            return "Whoops! something went wrong.";
        }
        return redirect('/login')->withErrors('Your account is active, please login');
    }
}
