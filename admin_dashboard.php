<?php

Session_start();
require_once("require/database_connection.php");

if(isset($_SESSION["user"]) && $_SESSION["user"]['role_id'] == 2){
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Dashboard</title>
        </head>
        <body>

            <h1 align = "center" style = "background-color: lightblue; height:80px; padding-top:30px;">Admin Dashboard</h1>
            
            <hr>
            <br>
            <p>Hello Welcome... <?php echo $_SESSION['user']['full_name']??""?></p>
            <p align = "right" style = "padding-right:40px;"><a href="logout.php">Logout</a></p>
            <hr>
           <p style="color:<?php echo $_GET['color'] ?? ""; ?>"><?php echo $_GET['msg'] ?? ""; ?></p>

            

            <h3>All Users</h3>
            <?php
                 
                 $query = "SELECT * FROM users";

                 $result = mysqli_query($connection, $query);

                if(mysqli_num_rows($result) >0){
                    ?>
                    <table border = "2" cellpadding = "5" cellspacing = "20">
                        <tr style = "background-color:lightblue">
                            <th>User id</th>
                            <th>Role id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Promote</th>

                        </tr>
                    
                    
                    <?php
                    while($row = mysqli_fetch_assoc($result)){
                        // echo "<pre>";
                        // print_r($row);
                        // echo "</pre>";

                        
                        ?>
                        <tr style = "background-color:lightgrey" >
                            <td><?php echo $row['user_id']??""?></td>
                            <td><?php echo $row['role_id']??""?></td>
                            <td><?php echo $row['full_name']??""?></td>
                            <td><?php echo $row['email']??""?></td>
                            <td><?php echo $row['password']??""?></td>
                            <td><a href="process.php?status=promote&user_id=<?php echo $row['user_id']?>">Promote</a></td>
                        </tr>
                        
                        <?php


                    }
                    ?>
                    </table>
                    <?php
                }   
            
            ?>



        </body>
        </html>

    
    
    
    <?php
}
elseif(isset($_SESSION["user"]) && $_SESSION['user']["role_id"] == 1){
    header("location: user_dashboard.php");
}
else{
    header("location:login.php ?msg=Login First&color=red");
}








?>