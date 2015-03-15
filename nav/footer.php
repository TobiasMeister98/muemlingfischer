<ul>
    <?php if (isset($_SESSION["isLoggedIn"]) === true) { ?>
    
    <li>
        <a href='?resource=user&section=management' class='footer-item'>Verwaltung</a>
    </li>
    <li>
        <a href='?resource=user&section=profile' class='footer-item'>Profil</a>
    </li>
    <li>
        <a href='?resource=auth&section=logout' class='footer-item'>Logout</a>
    </li>
    
    <?php } else { ?>
    
    <li>
        <a href='?resource=auth&section=login' class='footer-item'>Login</a>
    </li>
    
    <?php } ?>
    
    <li>
        <a href="?resource=docs&section=impressum" class="footer-item">Impressum</a>
    </li>
</ul>