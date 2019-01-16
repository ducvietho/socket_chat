@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" >
                <div id="messages" ></div>
            </div>
        </div>
    </div>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
    <script>

        var socket = io('http://192.168.1.34:3000');
        socket.on("channel_user_7:App\\Events\\ChatUserEvent", function(message){
            $( "#messages" ).append( "<p>"+message+"</p>" );
        });
    </script>
@stop

