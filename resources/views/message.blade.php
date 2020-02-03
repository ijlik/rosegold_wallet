@extends('layouts.app')
@section('content')
    <h3>Message Center</h3>
    <form name="message" method="post" action="/message" onsubmit="document.getElementById('btn-message').type = 'button';">
        @csrf
        <textarea cols="60" rows="8" name="message" required></textarea>
        <br>
        <br>
        <input id="btn-message" type="submit" class="buttn" value="Send message to support">
    </form>
    <br>
    <form id="delete-message" method="post" action="message/delete">
        @csrf
        <input type="button" class="buttn" onclick="confirmDelete()" value="Delete all messages">
        <br>
        <input type="checkbox" id="check" class="checkb"> Click here to confirm delete
    </form>
    <br>
    <hr>
    <script>
        function confirmDelete() {
            if(document.getElementById('check').checked){
                document.getElementById('delete-message').submit();
            }
        }
    </script>
    <input type="hidden" id="last_id" value="{{ $id }}">
    <div id="list-message">
    @foreach($data as $ini)
        <h4 style="color: limegreen">{{ $ini->from }}: </h4><?=$ini->content;?><hr>
    @endforeach
    </div>
@stop

@section('script')
    <script>
        function setMessage() {
            var id = $('#last_id').val();
            $.ajax({
                url: '/get_new_message/' + id,
                type: 'GET',
                dataType: 'json',
                success: function (result) {
                    if (result != 0 || result != '0') {
                        console.log(result['id']);
                        $('#last_id').val(result['id']);
                        $('#list-message').prepend("<h4 style=\"color: limegreen\">" + result['from'] + ": </h4>" + result['content'] + "<hr>");
                    }
                    setTimeout(function () {
                        setMessage()
                    }, 1000);
                }
            });
        }
        setMessage()
    </script>
@stop
