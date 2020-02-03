@extends('layouts.app')
@section('content')
    <h3>Frequently Answered Questions:</h3>
    <strong>What is RoseWallet?</strong><br><br>
    RoseWallet is an easy to use browser based Ethereum wallet.<br>
    We aim to provide usability and security at the same time.<br>
    <br>
    <strong>Are there any fees on RoseWallet?</strong><br><br>
    We do not charge any fees except for the transaction fees on the ethereum network.<br>
    <br>
    <strong>Is RoseWallet easier than the standard ethereum.org client?</strong><br><br>
    RoseWallet is as simple and easy as possible, we have a very
    minimalistic interface which should be easy to understand for most
    people.<br>
    <br>
    <strong>Is it more secure than the standard ethereum.org client?</strong><br><br>
    With the standard ethereum.org client you will need a lot of knowledge
    about how to protect your wallet.dat file, which is basically impossible
    for most normal people who do not run multiple PCs, virtualization
    software, encryption tools etc.<br>
    Also if you do not make regular backups on the standard client, there is a high risk of loosing your coins.<br>
    On RoseWallet we take care of all that, protecting your ethereum funds
    while all you have to do is keep your password and optionally
    transaction PIN in a safe place.<br>
    <br>
    <strong>How does RoseWallet protect my ethereums?</strong><br><br>
    We are using encrypted ethereum wallets, hard disk encryption, SSL
    certificates and a hardened webserver for maximum security of your
    ethereums.<br>
    We also do daily encrypted backups to different offsite locations worldwide.<br>
    Most ethereums are not even stored on the webserver, we store them on an impossible to hack offline wallet.<br>
    <br>
    <strong>What happens if i lose my password?</strong><br><br>
    Do not lose your password or transaction PIN! We do not have password
    recovery functions for security reasons. (Most accounts get hacked these
    days using weak password recovery functions)<br>
    We recommend you write down your password and if you have it enabled
    also your transaction PIN on a piece of paper and store it securely.<br>
    <br>
    <strong>Can i get a new ethereum address?</strong><br><br>
    To keep it simple we only support one address per account, but you are free to open as many accounts as you wish!<br>
@stop
