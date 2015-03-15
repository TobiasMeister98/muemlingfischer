<!DOCTYPE html>

<?php session_start(); ?>

<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Mümlingfischer</title>

    <script type="text/javascript">
        function msieversion() {
            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
                document.write('<div style="width: 1000px; margin: 200px auto 0; border: 1px solid #888; padding: 10px; border-radius: 5px; box-shadow: 5px 5px 5px #444;"><h1 style="color: #f00;">Tut uns leid!</h1><hr>' +
                               '<h2>Diese Webseite ist nicht leider mit Ihrem Browser (Internet Explorer) kompatibel!<br>' +
                               'Bitte verwenden Sie einen anderen Browser, um diese Webseite aufzurufen.</h2><hr>' +
                               '<h3>M&ouml;gliche Browser:</h3>' +
                               '<h4>&#9679; <a href="https://www.mozilla.org/de/firefox/new/#">Mozilla Firefox</a></h4>' +
                               '<h4>&#9679; <a href="https://www.google.de/intl/de/chrome/browser/desktop/index.html">Google Chrome</a></h4></div>');
                document.write('<script type="text/undefined">');
            }
            return false;
        }
    </script>
    
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.ico">
    
    <script src="js/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="css/slimbox2.css">
    <script src="js/slimbox2.js"></script>
</head>

<body onload="msieversion();">
    <div class="wrapper-main">
        <header class="header-main">
            <a href="index.php"></a>
        </header>

        <nav class="nav-main">
            <?php include("nav/nav.html"); ?>
        </nav>

        <main class="content-main">
            <?php include("nav/sites.php"); ?>
        </main>

        <footer class="footer-main">
            <?php include("nav/footer.php"); ?>
        </footer>
    </div>
</body>
</html>