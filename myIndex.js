var app = require('express')();

var server = require('http').Server(app);

var io = require('socket.io')(server);

server.listen(3000);

app.get('/', function(request,response){
  response.sendFile(__dirname + '/myIndex.html');
});

io.on('connection',function(socket){
    socket.on('chat.message',function (message) {
      console.log(message);
      io.emit('chat.message',message);
    });
});
