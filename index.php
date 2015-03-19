<!DOCTYPE html>

<?php session_start();

include("auth/db_auth.php");

$pg_sql = "SELECT name
        FROM page
        WHERE id = 1
        LIMIT 1";
$pg_result = $conn->query($pg_sql);

$pg_row = $pg_result->fetch_assoc();

$conn->close();

?>

<html lang="de">
<head>
    <meta charset="utf-8">
    <title><?php echo $pg_row["name"]; ?></title>

    <script src="js/page/noie.js"></script>
    
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.ico">
    
    <link rel="stylesheet" href="css/slimbox2.css">
</head>

<body>
    <div class="wrapper-main">
        <header>
            <a href="/muemlingfischer"></a>
        </header>

        <nav>
            <?php include("nav/nav.html"); ?>
        </nav>

        <main>
            <?php include("nav/sites.php"); ?>
        </main>

        <footer>
            <?php include("nav/footer.php"); ?>
        </footer>
    </div>
    
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/slimbox2.js"></script>
</body>
</html>