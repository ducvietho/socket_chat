var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis(3001);

io.on('connection', function (socket) {

});

redis.psubscribe('*', function(err, count) {
});

redis.on('pmessage', function(partner,channel, message) {
    console.log('Message Recieved: ' + message+', chanel:'+channel);
    message = JSON.parse(message);
    console.log(channel + ':' + message.event);
    io.emit(channel + ':' + message.event, message.data);
    console.log('Sent');
});
http.listen(3000, function(){
    console.log('Listening on Port 3000');
});