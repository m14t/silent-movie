<html>
    <head>
      <style>
          @font-face {
              font-family: 'silentina_filmregular';
              src: url('font/typodermic_-_silentinafilm-regular-webfont.eot');
              src: url('font/typodermic_-_silentinafilm-regular-webfont.eot?#iefix') format('embedded-opentype'),
                   url('font/typodermic_-_silentinafilm-regular-webfont.woff') format('woff'),
                   url('font/typodermic_-_silentinafilm-regular-webfont.ttf') format('truetype'),
                   url('font/typodermic_-_silentinafilm-regular-webfont.svg#silentina_filmregular') format('svg');
              font-weight: normal;
              font-style: normal;

          }
          body {
            color: #eee;
            font-family: "silentina_filmregular", sans-serif;
            background:url(img/bg.png);
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
                //-- Wrap in Smart Quotes
                el.innerHTML = '&ldquo;'+ data +'&rdquo;';
            });
        </script>
    </body>
</html>
