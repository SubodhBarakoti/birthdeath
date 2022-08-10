<?php
    $dbconn=mysqli_connect("localhost","root","","birthdate");
    
    session_start();
    if(($_SESSION)){
        $query="SELECT * FROM death";
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
                            <th>Death registration number</th>
                            <th>Birth registration number</th>
                            <th>Name of person</th>
                            <th>Date of birth</th>
                            <th>Date of death</th>
                            <th>Death time</th>
                            <th>Death Cause</th>
                            <th>Issue Date</th>
                        </tr>
                        <?php
                            while($row=mysqli_fetch_assoc($result)){
                                $row1=mysqli_fetch_assoc(mysqli_query($dbconn,"SELECT * FROM birth WHERE birthid='".$row['birthid']."'"));
                                ?>
                                    <tr>
                                        <td><?php echo $row['deathid']; ?></td>
                                        <td><?php echo $row['birthid']; ?></td>
                                        <td><?php echo $row1['name']; ?></td>
                                        <td><?php echo $row1['dob']; ?></td>
                                        <td><?php echo $row['deathdate']; ?></td>
                                        <td><?php echo $row['deathtime']; ?></td>
                                        <td><?php echo $row['deathcause']; ?></td>
                                        <td><?php echo $row['deathissuedate']; ?></td>
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