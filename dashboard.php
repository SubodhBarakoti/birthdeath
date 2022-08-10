<?php
    if(isset($_GET['birthregister_success'])){
        if($_GET['birthregister_success']==1){
            echo "<script>alert('Registration Successful');</script>";
        }
        else{
            echo "<script>alert('Registration Unsucessful');</script>";
        }
    }
    $dbconn=mysqli_connect("localhost","root","","birthdate");
    
    session_start();
    if(($_SESSION)){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="style.css">
                <title>Dashboard</title>
            </head>
            <body>
                <div class="logout">
                    <a href="logout.php">
                        <button>Logout</button>
                    </a>
                </div>
                <div class="dashboardbuttons">
                    <div class="registerbith">
                        <a href="registerbirth.php"><button>Register Birth</button></a>
                    </div>
                    <div class="registerdeath">
                        <a href="registerdeath.php"><button>Register Death</button></a>
                    </div>
                    <div class="viewregisteredbirth">
                        <a href="viewregisteredbirth.php"><button>View Registered Birth</button></a>
                    </div>
                    <div class="viewregistereddeath">
                        <a href="viewregistereddeath.php"><button>View Registered Death</button></a>
                    </div>
                </div>
            </body>
            </html>
        <?php
    }
    else{
        echo'access denied';
        echo'<br><a href="login.php"><button>Go to login page</button></a>';
    }
?>