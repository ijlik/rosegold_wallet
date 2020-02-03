<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use SendGrid\Mail\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email'    => 'required|string|email|max:255',
        ]);
        $user = User::where('email','=', $validatedData['email'])->first();
        if(is_null($user)){
            return view('auth.passwords.email',[
                'message' => 'Email is not registered yet',
                'type' => 'error'
            ]);
        }
        $token = Password::getRepository()->create($user);
        $email = new Mail();
        $email->setFrom(env('ADMIN_MAIL'), env('MAIL_FROM_NAME'));
        $email->setSubject("Reset Password Request HLOB Coin ");
        $email->addTo($user->email, $user->name);
        $email->addContent("text/plain", "Hello, ".$user->name);
        $email->addContent("text/html","<p>Reset password success.</p><br><a href='".route('password.reset', $token)."'>Click here to reset password</a><br><p>Thank you for join with us <a href='https://hlobcoin.com'>HLOB Coin</a></p>");
        $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
        } catch (\Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
        return view('auth.passwords.email',[
            'message' => 'Link reset password has been sent to your email',
            'type' => 'success'
        ]);
    }
    public function showLinkRequestForm(){
        return view('auth.passwords.email',[
            'message' => null
        ]);
    }
}
