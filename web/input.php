<html>
    <head>
    </head>
    <body>
        <form id="form">
            <textarea id="ta"></textarea>
            <input type="submit" />
        </form>
        <script src="js/jquery-1.8.3.min.js"></script>
        <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>:8080/socket.io/socket.io.js"></script>
        <script>
            var socket = io.connect('http://<?php echo $_SERVER['HTTP_HOST']; ?>:8080'),
                el = document.getElementById('ta'),
                $form = $('#form');

            $form.submit(function() {
                socket.emit('send', el.value);
                return false;
            });

            socket.on('news', function (data) {
                console.log(data);
            });
        </script>
    </body>
</html>
