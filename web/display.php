<html>
    <head>
      <style>
          body {
            color: #eee;
            background:url(img/bg.png);
            background-size:100% 100%; /* Firefox */
            background-size:100% 100%;
            background-repeat:no-repeat;
          }
          #wrapper {
            display: table;
            height: 100%;
            width: 100%;
          }
          #output {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
          }
      </style>
    </head>
    <body>
        <div id="wrapper">
          <div id="output">
          </div>
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
