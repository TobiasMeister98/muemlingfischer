<ul>
    <?php if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]) { ?>
    
    <li>
        <a href='?section=management' class='footer-item'>Verwaltung</a>
    </li>
    <li>
        <a href='?section=profil' class='footer-item'>Profil</a>
    </li>
    <li>
        <a href='?section=logout' class='footer-item'>Logout</a>
    </li>
    
    <?php } else { ?>
    
    <li>
        <a href='?section=login' class='footer-item'>Login</a>
    </li>
    
    <?php } ?>
    
    <li>
        <a href="?section=impressum" class="footer-item">Impressum</a>
    </li>
</ul>