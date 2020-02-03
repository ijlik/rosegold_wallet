<?php

namespace App\Console\Commands;

use App\Balance;
use App\Exchange;
use App\Transaction;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class AddBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:balance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Balance from admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = 'ijlik.k5s@gmail.com';
        $amount = 10000;
        $user = User::where('email',$email)->first();

        $tx = new Transaction();
        $tx->user_id = $user->id;
        $tx->type = 'deposit';
        $tx->amount_usd = $amount;
        $tx->amount_hlob = 0;
        $tx->rate = Exchange::whereDay('created_at', '=', date('d'))->first()->rate_usd;
        $tx->status = 'success';
        $tx->save();


        $bal = Balance::where('user_id', '=', $tx->user_id)->first();
        $bal->usd += $tx->amount_usd;
        $bal->save();
    }
}
