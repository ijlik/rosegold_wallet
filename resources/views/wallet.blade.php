@extends('layouts.app')
@section('content')
    <h3>Ethereum Wallet</h3>
    Your Ethereum balance: <strong id="balance_eth"></strong> ETH<br>
    <br>
    Your QR Ethereum Address:<br>
    <canvas id="canvas"></canvas>
    <script src="/node_modules/qrcode/build/qrcode.min.js"></script>
    <script>
        QRCode.toCanvas(document.getElementById('canvas'), 'eth:{{ auth()->user()->address }}', function (error) {
            if (error) {console.error(error);}
        })
    </script><br><br>
    Your Ethereum address:
    <strong>{{ auth()->user()->address }}</strong>
    <br>
    <br>
    To recieve Ethereums, give the address above to the sender of the Ethereums.
    <br>
    <br>
    <strong>Send Ethereums:</strong>
    <br>
    <br>
    <form name="btc" method="post" action="/wallet" onsubmit="document.getElementById('btn-send').type = 'button';">
        @csrf
        Send Ethereums to this address or RoseWallet username:
        <br>
        <input type="text" class="txt" name="address" size="50" required autocomplete="off">
        <br>
        Amount in Ethereums:
        <br>
        <input type="number" step="any" min="0.001" max="10" class="txt" name="amount" size="12" required autocomplete="off">
        <br>
        Pin:
        <br>
        <input type="text" class="txt" name="pin" size="5" required autocomplete="off">
        <br>
        <br>
        <input id="btn-send" type="submit" class="buttn" value="Send Ethereums">
    </form>
    <br>
    Transaction fee: ~0.0005 ETH. May vary depending on Ethereum network usage.
    <br>
    <br>
    <a href="/history">Transaction List</a>
    <br>
    <br>
@stop

@section('script')
{{--<script>--}}
    {{--function setBalance(){--}}
        {{--$.ajax({--}}
            {{--url: '/get_balance',--}}
            {{--type: 'GET',--}}
            {{--dataType: 'text',--}}
            {{--success: function (result) {--}}
                {{--$("#balance_eth").html(result);--}}
                {{--setTimeout(function () {--}}
                    {{--setBalance()--}}
                {{--},1000);--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}
    {{--setBalance()--}}
{{--</script>--}}
@stop
