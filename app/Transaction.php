<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $fillable = ['user_id','type','address','name','amount','txid','fee'];

    const TYPE_SEND = 'send to';
    const TYPE_RECEIVE = 'receive from';
}
