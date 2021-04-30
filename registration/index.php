<?php
    session_start();

    //conect to database
    $db = mysqli_connect("localhost", "root", "", "authentication");

    if(isset($_POST['register_btn'])) {
        session_start();
        $username = mysql_real_escape_string($_POST['username']);
        $email = mysql_real_escape_string($_POST['email']);
        $password = mysql_real_escape_string($_POST['password']);
        $password2 = mysql_real_escape_string($_POST['password2']);

        if($password == $password2) {
            //create user
            $password = md5($password);
            $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
            mysqli_query($db, $sql);
            $_SESSION['message'] = "You are now logged in";
            $_SESSION['username'] = $username;
            header("location: home.php");
        }else{
            $_SESSION['message'] = "The two password do not match";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>SING UP</h1>
    <form action="index.php" method="post">
        <h3>Username:</h3>
        <input type="text" name="username" class="inpat">

        <h3>Email:</h3>
        <input type="email" name="email" class="inpat">

        <h3>Password:</h3>
        <input type="password" name="password" class="inpat">

        <h3>Password again:</h3>
        <input type="password" name="password2" class="inpat">

        <input type="submit" name="register_btn" value="Register" class="submit">
    </form>
</body>
</html>