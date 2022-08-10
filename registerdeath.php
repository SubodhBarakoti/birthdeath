<?php
    $dbconn=mysqli_connect("localhost","root","","birthdate");
    if(isset($_POST['registerdeath'])){
        $birthid=$_POST['birthid'];
        $deathplace=$_POST['deathplace'];
        $deathdate=$_POST['deathdate'];
        $deathtime=$_POST['deathtime'];
        $deathcause=$_POST['deathcause'];
        $issuedate=date("Y-m-d");
        if(!empty($birthid) && !empty($deathplace) && !empty($deathdate) && !empty($deathtime) && !empty($deathcause)){
            $query1='SELECT * FROM death WHERE birthid="'.$birthid.'"';
            $result1=mysqli_query($dbconn,$query1);
            if(mysqli_num_rows($result1)>0){
                echo'<script>alert("Person Already died");</script>';
            }
            else{
                $query2='SELECT * FROM birth WHERE birthid="'.$birthid.'"';
                $result2=mysqli_query($dbconn,$query2);
                if(mysqli_num_rows($result2)>0){
                    $query='INSERT INTO death(birthid,deathplace,deathdate,deathtime,deathcause,deathissuedate) VALUES("'.$birthid.'","'.$deathplace.'","'.$deathdate.'","'.$deathtime.'","'.$deathcause.'","'.$issuedate.'")';
                    $result=mysqli_query($dbconn,$query);
                    if($result){
                        header('location:dashboard.php?deathregister_success=1');
                    }
                    else{
                        header('location:dashboard.php?deathregister_success=0');
                    }
                }
                else{
                    echo'<script>alert("Person with this birth id is not registered");</script>';
                }
            }
        }
        else{
            echo'<script>alert("Fill all the fields");</script>';
        }
    }
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
                <div class="gotodashboard">
                    <a href="dashboard.php"><button>Go to Dashboard</button></a>
                </div>
                <div class="logout">
                    <a href="logout.php">
                        <button>Logout</button>
                    </a>
                </div>
                <div class="birthregistrationform">
                    <form action="" method="post">
                        <input type="number" name="birthid" id="birthid" placeholder="Enter the birth id"><br>
                        <input type="text" name="deathplace" id="deathplace" placeholder="Enter the place of death"><br>
                        <input type="date" name="deathdate" id="deathdate" placeholder="Enter the date of death"><br>
                        <input type="text" name="deathcause" id="deathcause" placeholder="Enter the cause of death"><br>
                        <input type="time" name="deathtime" id="deathtime" placeholder="Enter the time of death"><br>
                        <input type="submit" value="Register Death" name="registerdeath" id="registerdeath"><br>
                    </form>
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