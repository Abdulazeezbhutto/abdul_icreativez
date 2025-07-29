<?php

session_start();

if(isset($_SESSION['user'])){
    if(isset($_SESSION["user"]) && $_SESSION["user"]['role_id'] == 1){
    ?>
    
        <!DOCTYPE html>
        <html>
        <head>
            <title> User Dashboard</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    text-align: center;
                    padding-top: 100px;
                }
                .dashboard {
                    background: white;
                    width: 100%;
                    margin: auto;
                    padding: 40px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px #ccc;
                }
            </style>
        </head>
        <body>

        <div class="dashboard">
            <h2>Welcome <?php echo $_SESSION['user']['full_name']??""?></h2>
            <p align = "right" style = "padding-right:40px;"><a href="logout.php">Logout</a></p>

        </div>

        </body>
        </html>
    
    
    <?php
    }
    elseif(isset($_SESSION["user"]) && $_SESSION['user']["role_id"] == 2){
        header("location: admin_dashboard.php");        
    }
    

}else{
    //login form
        header("location: login.php ?msg=login first&color=red");        

}







?>



