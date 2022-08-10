<?php
    $dbconn=mysqli_connect("localhost","root","","birthdate");
    
    session_start();
    if(($_SESSION)){
        $query="SELECT * FROM birth";
        $result=mysqli_query($dbconn,$query);
        if($result){

        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="style.css">
                <title>Registered Birth</title>
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
                <div class="birthtable">
                    <table>
                        <tr>
                            <th>Birth registration number</th>
                            <th>Child Name</th>
                            <th>Death of birth</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Grandparent's Name</th>
                            <th>Birth Place</th>
                            <th>Hospital</th>
                            <th>Issue Date</th>
                        </tr>
                        <?php
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['birthid']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['dob']; ?></td>
                                        <td><?php echo $row['fathername']; ?></td>
                                        <td><?php echo $row['mothername']; ?></td>
                                        <td><?php echo $row['grandparentname']; ?></td>
                                        <td><?php echo $row['birthplace']; ?></td>
                                        <td><?php echo $row['hospitalname']; ?></td>
                                        <td><?php echo $row['issuedate']; ?></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </table>
                </div>
            </body>
            </html>
        <?php
        }
        else{
            header("Location:dashboard.php?error=true");
        }
    }
    else{
        echo'access denied';
        echo'<br><a href="login.php"><button>Go to login page</button></a>';
    }
?>