<?php

session_start();

if(isset($_SESSION['user'])){
    if(isset($_SESSION["user"]) && $_SESSION["user"]['role_id'] == 1){
    ?>
    
     <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .sidebar {
      height: 100vh;
      background-color: #2d323e;
      color: white;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 10px 20px;
    }

    .sidebar a:hover {
      background-color: #3e4451;
    }

    .card-box {
      background-color: white;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 sidebar p-3">
        <h4 class="text-center">Icreative Tech</h4>
        <hr>
        <p class="fw-bold text-uppercase">Navigation</p>
        <a href="#"><i class="bi bi-speedometer2"></i> User Dashboard</a>
        <p class="fw-bold text-uppercase mt-4">Logout</p>
        <a href="logout.php"><i class="bi bi-calendar"></i> logout</a>    

      </nav>

      <!-- Main Content -->
      <main class="col-md-10 p-4">
        <!-- Header -->
       
      <!--navbar-->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <a class="navbar-brand" href="#">ICREATIVEZ</a>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               
              </ul>
              
                <button class="btn btn-outline-danger" type="submit"><a class="nav-link" href="logout.php">Logout</a></button>
            </div>
          </div>
        </nav>
        <!--navbar-->
        <div class="h4 pb-2 mt-6 text-primary-emphasis border-top border-success">
          Hello Welcome... <?php echo $_SESSION['user']['full_name']??""?>
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



