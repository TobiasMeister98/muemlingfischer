<ul>
    <?php
    
    if (isset($_SESSION["isLoggedIn"])) {
        if ($_SESSION["isLoggedIn"]) {
            echo "
                <li>
                    <a href='?section=profil' class='footer-item'>Profil</a>
                </li>
                <li>
                    <a href='?section=logout' class='footer-item'>Logout</a>
                </li>
            ";
        } else {
            echo "
                <li>
                    <a href='?section=login' class='footer-item'>Login</a>
                </li>
            ";
        }
    } else {
        echo "
            <li>
                <a href='?section=login' class='footer-item'>Login</a>
            </li>
        ";
    }
    
    ?>
    
    <li>
        <a href="?section=impressum" class="footer-item">Impressum</a>
    </li>
</ul>