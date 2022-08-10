<?php
    $dbconn=mysqli_connect("localhost","root","","birthdate");

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = 'SELECT * FROM admin WHERE username = "'.$username.'" AND password = "'.$password.'"';
        $result = mysqli_query($dbconn,$query);
        if($result){
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_array($result);
                session_start();
                $_SESSION['admin_id']=$row['admin_id'];
                
                header('location:dashboard.php');
            }
            else{
                echo 'incorrect passord or username';
            }
        }
        else{
            echo 'error';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body>
    <div id="heading" style="text-align: center; font-size: 30px; font-weight: bold; color: #4CAF50;">
        Login Form
    </div>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="login" value="login">
    </form>
</body>
</html>