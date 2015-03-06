<!DOCTYPE html>

<?php session_start(); ?>

<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Mümlingfischer</title>

    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="resources/favicon.ico">
    
    <script src="js/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="css/slimbox2.css">
    <script src="js/slimbox2.js"></script>
</head>

<body>
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