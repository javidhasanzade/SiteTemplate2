<?php
    include "translation.php";
    if (isset($_GET["lang"]) && in_array($_GET["lang"],$langs)) {
        setcookie("lang",$_GET["lang"], time() + (86400 * 30), "/");
        $lang = $_GET["lang"];
    } else if(isset($_COOKIE["lang"])) {
        $lang = $_COOKIE["lang"];
    } else { 
        $lang = "en";
    }

    $page = isset($_GET["page"]) ? $_GET["page"] : "main";

    $file = $lang . "/" . $page . ".php";
    if(!file_exists($file)) $file = "404.php";

    include "header.php";
    include $file;
    include "footer.php"
?>