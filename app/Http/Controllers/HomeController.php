<?php

namespace App\Http\Controllers;

use App\Balance;
use App\ComLeadership;
use App\ComReff;
use App\Exchange;
use App\Invest;
use App\Message;
use App\Package;
use App\Transaction;
use App\Unilevel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\In;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/');
    }
}
