<?php

unset($_SESSION);
session_destroy();

header("location: ?resource=nav&section=redirect");

?>