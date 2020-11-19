<?php
    session_start();

    if(!isset($_SESSION["user"])) {
        header("Location: login.php");
        die();
    }

    if(isset($_GET["action"]) && $_GET["action"] == "logout") {
        session_unset();
        session_destroy();
        header("Location: login.php");
        die();
    }

    include "translation.php";

    $lang = (isset($_GET["lang"])) ? $_GET["lang"] : "en";
    $page = (isset($_GET['page'])) ? $_GET['page'] : 'about';
    $file = $lang . "/" . $page . ".php";

    if(isset($_GET['text']) && $_GET['text'] != '') {
        file_put_contents($file, $_GET['text']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form > p {
            text-indent: 0;
        }
        form input , form textarea {
            border: 1px solid gray;
            width: 100%;
            margin: 5px;
            padding: 10px;
            border-radius: 5px;
        }
        form textarea {height: 500px; }
        input[type="submit"] {
            width: 200px;
        }
        nav ul li a {
            padding: 5px!important;
            border-radius: 5px;
        }
    </style>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
    <header>CMS - Content Management System</header>

    <nav>
    <p>
    <?php
        for($i = 0; $i < count($langs);$i++) {
            $check = ($lang == $langs[$i]) ? "checked" : "";
            echo '<input '.$check.' onClick="location=\'?lang='.$langs[$i]. '\'"name="lang" type="radio"/> ' . ucfirst($langs[$i]);
            
        }
    ?>
    </p>
    <ul>
    <?php
        foreach($menu[$lang] as $p => $m) {
            echo '<li><a href="?lang='. $lang .'&page='. $p .'">'. $m .'</a></li>';
        }
    ?>
    </ul>
    <p>Welcome, <?=$_SESSION["user"]?>.
    <br> <a href="?action=logout">Log out</a></p>
    </nav>
    <main>
        <form>
            <input type="hidden" name="lang" value="<?=$lang?>" />
            <input type="hidden" name="page" value="<?=$page?>" />
            <input type="text" readonly value="<?=$menu[$lang][$page]?>">
            <textarea name="text" id="" cols="30" rows="10"><?php include $file; ?></textarea>
            <input type="submit" value="Ok">
        </form>
    </main>
    <footer></footer>
</body>
</html>