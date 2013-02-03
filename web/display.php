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
          #outer-wrapper {
            position: relative;
            top: 15%;
            left: 10%;
            height:  70%;
            width:  80%;
            overflow: hidden;
            text-align: center;
          }
          #wrapper {
            display: table;
          }
          #output {
            display: table-cell;
            vertical-align: middle;
          }
      </style>
    </head>
    <body>
        <div id="outer-wrapper">
          <div id="wrapper">
            <div id="output">
            </div>
          </div>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="js/jquery.fittext.js"></script>
        <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>:8080/socket.io/socket.io.js"></script>
        <script>
            var socket = io.connect('http://<?php echo $_SERVER['HTTP_HOST']; ?>:8080'),
                $el = $('#output'),
                owh = $('#outer-wrapper').height(),
                oww = $('#outer-wrapper').width(),
                fs = parseInt($el.css('font-size'), 10);
            socket.on('output', function (data) {
                //-- Wrap in Smart Quotes
                $el.css('padding-top', 0);
                $el.html('&ldquo;'+ data +'&rdquo;');
                while ($el.height() < owh && $el.width() < oww) {
                  fs++;
                  $el.css('font-size', fs+'px');
                }
                while ($el.height() > owh || $el.width() > oww) {
                    fs--;
                    $el.css('font-size', fs+'px');
                }
                fs--;
                $el.css('font-size', fs+'px');
                $el.css('padding-top', (owh - $el.height())/2);
            });
        </script>
    </body>
</html>
