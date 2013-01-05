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
            overflow: hidden;
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
        <script src="js/jquery-1.8.3.min.js"></script>
        <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>:8080/socket.io/socket.io.js"></script>
        <script>
            var socket = io.connect('http://<?php echo $_SERVER['HTTP_HOST']; ?>:8080'),
                $el = $('#output'),
                $body = $('body'),
                size = parseInt($el.css('font-size'), 10);

            socket.on('output', function (data) {
                var body_height = $body.height(),
                    body_width = $body.width();
                //-- Wrap in Smart Quotes
                $el.html('&ldquo;'+ data +'&rdquo;');
                size = parseInt($el.css('font-size'), 10);
                while ($el.height() <= body_height && $el.width() <= body_width) {
                    size++;
                    $el.css('font-size', size +'px');
                    console.log('bigger', $el.css('font-size'), $el.height(), body_height, $el.width(), $body.width());
                }
                while ($el.height() > body_height && $el.width() > body_width) {
                    size--;
                    $el.css('font-size', size +'px');
                    console.log('smaller', $el.css('font-size'), $el.height(), body_height, $el.width(), $body.width());
                }
                console.log('---');
            });
        </script>
    </body>
</html>
