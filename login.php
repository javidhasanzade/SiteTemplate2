<?php
    session_start();
    $message = "";
    if (isset($_POST["user"]) && isset($_POST["pass"])) {
        $user = $_POST["user"];
        $pass = $_POST["pass"];
    
        if($user == "admin" && $pass == "123qwe123") {
            $_SESSION["user"] = "admin";
            header("Location: admin.php");
        }
        elseif( $user == "" || $pass == '') {
        $message = "Fill gaps";
        } else {
            $message = "Please provide true username and/or password";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
    * { box-sizing: border-box;}
        body {
            display: flex;
            height: 100vh;
        }
        form { margin: auto; padding: 40px 30px; box-shadow: 0 0 10px gray;}
        form > input {
            width: 100%;
            margin: 10px;
            padding: 10px;
        }
       form > h1 {font: bold 2em Arial; color: gray;}
       form > p {background: green; padding: 20px 30px; color: white;}
  </style>
</head>
<body>
    <form method="POST">
        <h1>Admin Login Form</h1>
        <input type="text" name="user" placeholder="Username"/>
        <input type="password" name="pass" placeholder="Password"/>
        <input type="submit" value="Log in"/>
        <?php
        if($message != "")
        {
           echo '<p>'.$message.'</p>';
        }
       
        ?>
    </form>
</body>
</html>