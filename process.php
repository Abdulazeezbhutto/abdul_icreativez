<?php
require_once("require/database_connection.php");
session_start();

        // Registration Process
            if (isset($_REQUEST['submit']) && $_REQUEST['submit'] === "Register") {

                if (!empty($_REQUEST["username"]) && !empty($_REQUEST["password"]) && !empty($_REQUEST['email'])) {
                    $user_name = $_REQUEST["username"];
                    $user_password = $_REQUEST["password"];
                    $user_email = $_REQUEST['email'];

                    // Check if email already exists
                    $check_query = "SELECT * FROM users WHERE email = '$user_email'";
                    $check_result = mysqli_query($connection, $check_query);

                    if (mysqli_num_rows($check_result) > 0) {
                        // Account already exists
                        header("location: register.php?msg=Account already exists..!&color=red");
                    } else {
                        // Hash the password
                        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

                        // Insert user with hashed password
                        $query = "INSERT INTO users (full_name, email, password) VALUES ('$user_name', '$user_email', '$hashed_password')";
                        $result = mysqli_query($connection, $query);

                        if ($result === false) {
                            header("location: register.php?msg=Something went wrong..!&color=red");
                        } else {
                            header("location: login.php?msg=Account created successfully..!&color=green");
                        }
                    }
                } else {
                    header("location: register.php?msg=Please fill all fields&color=red");
                }
            }

        // Login Process
            elseif (isset($_REQUEST["submit"]) && $_REQUEST["submit"] === "Login") {
                if (!empty($_REQUEST["email"]) && !empty($_REQUEST["password"])) {
                    $user_email = $_REQUEST["email"];
                    $user_password = $_REQUEST["password"];

                    // Fetch user from DB
                    $query = "SELECT * FROM users WHERE email = '$user_email'";
                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);

                        // Verify the password
                        if (password_verify($user_password, $row['password'])) {
                            $_SESSION['user'] = $row;

                            if ($row['role_id'] == 1) {
                                header("location:user_dashboard.php");
                            } elseif ($row['role_id'] == 2) {
                                header("location:admin_dashboard.php");
                            }
                        } else {
                            // Wrong password
                            header("location: login.php?msg=Invalid Email or Password&color=red");
                        }
                    } else {
                        // Email not found
                        header("location: login.php?msg=Invalid Email or Password&color=red");
                    }
                } else {
                    header("location: login.php?msg=Please fill all fields&color=red");
                }
            }

        // Promote User to Admin
            elseif (isset($_REQUEST['status']) && $_REQUEST['status'] == "promote") {
                $user_id = $_REQUEST["user_id"];
                $query = "UPDATE `users` SET `role_id` = 2 WHERE `user_id` = $user_id";
                $result = mysqli_query($connection, $query);

                if ($result) {
                    header("Location: admin_dashboard.php?msg=User Promoted&color=green");
                } else {
                    header("Location: admin_dashboard.php?msg=Something went wrong&color=red");
                }
                exit();
            }

?>
