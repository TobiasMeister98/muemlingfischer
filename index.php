<!DOCTYPE html>

<?php session_start(); ?>

<html lang="de">
    <head>
        <meta charset="UTF-8">
        
        <title>Mümlingfischer</title>
        
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="css/global.css">
        
        <link rel="icon" href="resources/icon/favicon.ico">
    </head>
    
    <body>
        <div class="wrapper-main">
            <header class="header">
                <a href="index.php"></a>
            </header>
            
            <nav class="nav-main">
                <?php include("nav.html"); ?>
            </nav>
                        
            <main class="content">
                <?php include("sites.php"); ?>
            </main>
            
            <footer class="footer-main">
                <?php include("footer.html"); ?>
            </footer>
        </div>
    </body>
</html>