<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body >
    <div class="container">
    <header><?=$content[$lang]["title"]?></header>
    <nav>
        <p>
            <?php
                for($i = 0; $i < count($langs); $i++) {
                echo '<a href="?lang='.$langs[$i].'">'.ucfirst($langs[$i]).'</a> | ';
                }
            ?>
         </p>
        <ul>
            <?php
               foreach($menu[$lang] as $p => $m) {
                echo '<li><a href="?&page='.$p.'">'.$m.'</a></li>';
               }


                
            ?>
            
            
        </ul>
    </nav>
    <main>