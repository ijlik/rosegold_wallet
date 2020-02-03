@extends('layouts.app')
@section('content')
    <h3>Transaction List:</h3>
    <table class="table1">
        <tr>
            <th>Date</th>
            <th>Type</th>
            <th>ETH Address</th>
            <th>Amount</th>
            <th>Tx ID</th>
        </tr>

        @foreach($data as $ini)
        <tr>
            <td>{{ $ini->created_at->format('j F Y H:i') }}</td>
            <td>{{ $ini->type }}</td>
            <td>{{ $ini->address }} {{ !is_null($ini->name) || $ini->name != ''?'('.$ini->name.')':'' }}</td>
            <td>{{ $ini->amount }}</td>
            <td>{{ $ini->txid }}</td>
        </tr>
        @endforeach
    </table>
    <br>
@stop
