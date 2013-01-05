var io = require('socket.io').listen(8080);

io.sockets.on('connection', function (socket) {
    socket.emit('output', 'Connected...');
    socket.on('send', function (data) {
        socket.broadcast.emit('output', data);
    });
});
