<?php if (!(isset($_SESSION["isLoggedIn"]))) { header("location: ?section=notloggedin"); exit; } else {



?>

<h1>Verwaltung</h1>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container">
        <h2 class="flush-top">Seiteninfo</h2>
        
        <table>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

    <div class="spacer-small"></div>

    <div class="container">
        <h2 class="flush-top">Seiteninfo ändern</h2>
        
        <table>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</form>

<div class="spacer-small"></div>

<div class="container">
    <a href="?resource=management&section=articles"><h2 class="flush-top flush-bottom">Zum Artikeleditor</h2></a>
</div>

<?php } ?>