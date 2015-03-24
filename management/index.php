<!DOCTYPE html>

<?php session_start();

include("../auth/db_auth.php");

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
    <title><?php echo $pg_row["name"]; ?> Verwaltung</title>
    
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="../img/favicon.ico">
</head>
<body>
    <div class="wrapper-main">
        <header>
            <?php include("nav/header.html"); ?>
        </header>

        <nav>
            <?php include("nav/nav.html"); ?>
        </nav>

        <main>
            <?php include("sites/index.php"); ?>
        </main>
    </div>
</body>
</html>