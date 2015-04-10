<ul>
    <li>
        <a href="" class="item">Seitenanfang &#8593;</a>
    </li>
</ul>

<ul>
    <?php
    
    if ( isset( $_SESSION['isLoggedIn'] ) ) {

        ?>

        <li>
            <a href="?panel=management" class="item">Verwaltung</a>
        </li>
        <li>
            <a href="?resource=auth&section=profile" class="item">Profil</a>
        </li>
        <li>
            <a href="?resource=auth&section=logout" class="item">Logout</a>
        </li>

        <?php

    } else {

        ?>

        <li>
            <a href="?resource=auth&section=login" class="item">Login</a>
        </li>

        <?php

    }
    
    ?>
    
    <li>
        <a href="?section=impressum" class="item">Impressum</a>
    </li>
</ul>
