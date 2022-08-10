<?php
    $dbconn=mysqli_connect("localhost","root","","birthdate");
    if(isset($_POST['registerbirth'])){
        $name=$_POST['name'];
        $dob=$_POST['dob'];
        $fathername=$_POST['fathername'];
        $mothername=$_POST['mothername'];
        $grandparentname=$_POST['grandparentname'];
        $hospitalname=$_POST['hospitalname'];
        $birthplace=$_POST['birthplace'];
        $issuedate=date("Y-m-d");
        if(!empty($name) && !empty($dob) && !empty($fathername) && !empty($mothername) && !empty($grandparentname) && !empty($hospitalname) && !empty($birthplace)){
            $query='INSERT INTO birth(name,dob,fathername,mothername,grandparentname,hospitalname,birthplace,issuedate) VALUES("'.$name.'","'.$dob.'","'.$fathername.'","'.$mothername.'","'.$grandparentname.'","'.$hospitalname.'","'.$birthplace.'","'.$issuedate.'")';
            $result=mysqli_query($dbconn,$query);
            if($result){
                header('location:dashboard.php?birthregister_success=1');
            }
            else{
                header('location:dashboard.php?birthregister_success=0');
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
                        <input type="text" name="name" id="name" placeholder="Enter the name of child"><br>
                        <input type="date" name="dob" id="dob" placeholder="Enter the date of birth"><br>
                        <input type="text" name="fathername" id="fathername" placeholder="Enter the father name"><br>
                        <input type="text" name="mothername" id="mothername" placeholder="Enter the mother name"><br>
                        <input type="text" name="grandparentname" id="grandparentname" placeholder="Enter the grandparentname's name"><br>
                        <input type="text" name="hospitalname" id="hospitalname" placeholder="Enter the hospital where the child was born"><br>
                        <input type="text" name="birthplace" id="birthplace" placeholder="Enter the birthplace of child"><br>
                        <input type="submit" value="Register Birth" name="registerbirth" id="registerbirth"><br>
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