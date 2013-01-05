<html>
    <head>
    </head>
    <body>
        <div id="output">
        </div>
        <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>:8080/socket.io/socket.io.js"></script>
        <script>
            var socket = io.connect('http://<?php echo $_SERVER['HTTP_HOST']; ?>:8080'),
                el = document.getElementById('output');
            socket.on('output', function (data) {
                el.innerHTML = data;
            });
        </script>
    </body>
</html>
