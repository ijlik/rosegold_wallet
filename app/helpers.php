<?php


if (!function_exists('generateNewAddress')) {
    /**
     * Verify PIN Google 2FA
     *
     * @return string
     */
    function generateNewAddress()
    {
        $client = new \GuzzleHttp\Client();
        $url = 'http://localhost:3000/api/wallet/eth/create';
        $res = $client->get($url);
        $data = json_decode($res->getBody(), true);
        return $data;
    }
}

if(!function_exists('getMessageCount')){
    function getMessageCount(){
        return \App\Message::where('user_id',auth()->user()->id)->get()->count();
    }
}

if(!function_exists('getNewMessage')){
    function getNewMessage($id){
        $message = \App\Message::where('user_id',auth()->user()->id)->where('id','>',$id)->orderBy('id','desc')->first();
        return is_null($message)?0:response()->json(['id'=>$message->id,'from'=>$message->from,'content'=>$message->content]);
    }
}

if(!function_exists('getBalanceBlockchain')){
    function getBalanceBlockchain($user){
        $address = $user->address;
        $client = new \GuzzleHttp\Client();
        $url = 'http://localhost:3000/api/wallet/eth/balance/'.$address;
        $res = $client->get($url);
        $data = json_decode($res->getBody(), true);
        return $data['balance'];
    }
}

if(!function_exists('getBlockCount')){
    function getBlockCount(){
        $client = new \GuzzleHttp\Client();
        $url = 'http://localhost:3000/api/wallet/eth/blockcount';
        $res = $client->get($url);
        $result = json_decode($res->getBody(), true);

        return $result;
    }
}

if(!function_exists('getBlock')){
    function getBlock($block){
        $client = new \GuzzleHttp\Client();
        $url = 'http://localhost:3000/api/wallet/eth/block/'.$block;
        $res = $client->get($url);
        $result = json_decode($res->getBody(), true);

        return $result;
    }
}

if(!function_exists('sendToBlockchain')){
    function sendToBlockchain($from, $privateKey, $to_address, $amount){
        $client = new \GuzzleHttp\Client();
        $url = 'http://localhost:3000/api/wallet/eth/send';

        $res = $client->post(
            $url,
            array(
                'form_params' => array(
                    'from' => $from,
                    'to' => $to_address,
                    'value' => $amount,
                    'privateKey' => $privateKey,
                ),
            )
        );
        $hasil = json_decode($res->getBody(), true);

        return $hasil['txHash'];
    }
}
