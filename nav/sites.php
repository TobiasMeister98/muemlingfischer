<?php

$section = "";
$resource = "";
$file_type = "";

if (isset($_GET["section"])) {
    $section = $_GET["section"];
    
    if (isset($_GET["resource"])) {
        $resource = $_GET["resource"]."/";
    } 
    
    if (file_exists($resource.$section.".html")) {
        $file_type = "html";
    } else if (file_exists($resource.$section.".htm")) {
        $file_type = "htm";
    } else if (file_exists($resource.$section.".php")) {
        $file_type = "php";
    }
} else {
    $section = "home";
    $resource = "docs/";
    $file_type = "php";
}

include($resource.$section.".".$file_type);

?>