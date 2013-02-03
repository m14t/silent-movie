var io = require('socket.io').listen(8080),
    last_msg = 'Connected...';

io.sockets.on('connection', function (socket) {
    socket.emit('output', last_msg)
    socket.on('send', function (data) {
        last_msg = data;
        socket.broadcast.emit('output', data);
    });
});
