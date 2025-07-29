<?php

    require_once("require/database_connection.php");
    session_start();

    // Registration Process
    if(isset($_REQUEST['submit']) and $_REQUEST['submit'] === "Register"){
            
            if(!empty($_REQUEST["username"]) AND !empty($_REQUEST["password"]) ){
                $user_name = $_REQUEST["username"];
                $user_password = $_REQUEST["password"];
                $user_email =  $_REQUEST['email'];
                $query = "SELECT * FROM users WHERE email = $user_email ";
                
                $result = mysqli_query($connection,$query);
            
                if($result === false){
                    $query = "INSERT INTO users (full_name , email , password) VALUES ('".$user_name."','".$user_email."','".$user_password."')";//insert data for creating account
                    $result = mysqli_query($connection,$query);
                    if($result === false){
                        // Something Went Wrong
                        header("location: register.php?msg=Account already Exist ..!&color=red");
                    }else{
                        // Account Created Successfully
                        header("location: login.php?msg=Account Created Successfully..!&color=green");

                    }

                }else{
                    //"redirect and account already exist";
                    header("location: register.php?msg = Something Went Wrong&color=red");
                }
            }else{
                //"redirect fill all columns";
                    header("location: register.php?msg = fill all columns&color=red");

            }
    }

    // Login Process

    elseif(isset($_REQUEST["submit"]) and $_REQUEST["submit"] === "Login"){
                echo "<pre>";
                print_r($_REQUEST);
                echo "</pre>";
                if (!empty($_REQUEST["email"]) && !empty($_REQUEST["password"])) {
                            $user_email = $_REQUEST["email"];
                            $user_password = $_REQUEST["password"];
                            $query = "SELECT * FROM users WHERE email = '" . $user_email . "' AND password = '" . $user_password . "'";

                            $result = mysqli_query($connection,$query);
                            if(mysqli_num_rows($result) > 0){
                                $row = mysqli_fetch_assoc($result);
                                echo "<pre>";
                                print_r($row);
                                echo "</pre>";
                                // checking role id and redirecitng to dashbaords
                                if($row['role_id'] == 1){
                                    // redirect users dashboard
                                    $_SESSION['user'] = $row;
                                    header("location:user_dashboard.php");
                                    
                                }
                                elseif($row['role_id'] == 2){
                                    // redirect admin dashboards
                                    $_SESSION['user'] = $row;

                                    header("location:admin_dashboard.php");

                                    
                                }
                        
                             
                            }else{
                                echo "Not found";
                                header("location: login.php?msg= Invalid Email Or password &color=red");
                                

                                
                            }
                
                } else {
                        
                    header("location: login.php?msg= Fill required data &color=red");

                    // header to login page
                }
    }

    // make user to admin

    elseif(isset($_REQUEST['status']) and $_REQUEST['status'] == "promote"){
        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";
        $user_id = $_REQUEST["user_id"]; 
        $query = "UPDATE `users` SET `role_id` = 2 WHERE `user_id` = $user_id";

        $result = mysqli_query($connection, $query);

        if ($result) {
            header("Location: admin_dashboard.php?msg=User+Promoted&color=green");
        } else {
            header("Location: admin_dashboard.php?msg=Something+went+wrong&color=red");
        }
        exit();
    }

    





?>