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
        <a href="#"><i class="bi bi-speedometer2"></i> Admin Dashboard</a>
        <p class="fw-bold text-uppercase mt-4">users</p>
        <a href="#"><i class="bi bi-calendar"></i> Admins</a>
        <a href="#"><i class="bi bi-calendar"></i> users</a>
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
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">admins</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">users</a>
                </li>
               
              </ul>
              
                <button class="btn btn-outline-danger" type="submit"><a class="nav-link" href="logout.php">Logout</a></button>
            </div>
          </div>
        </nav>
        <!--navbar-->
        <div class="h4 pb-2 mt-6 text-primary-emphasis border-top border-success">
          Hello Welcome... <?php echo $_SESSION['user']['full_name']??""?>
        </div>
        <div class="h6 pb-2 mt-6 text-primary-emphasis border-top border-success">
          All Users 
        </div>
        <?php
           $query = "SELECT * FROM users WHERE user_id != '{$_SESSION["user"]["user_id"]}'";

                 $result = mysqli_query($connection, $query);

                if(mysqli_num_rows($result) >0){
                    ?>
        <table class="table table-striped table-hover">
          </thead>
              <tbody>
                <tr>
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
                        if($row['role_id'] == '2'){
                            $users[]=$row;

                        }
                        
                        ?>
                        <tr style = "background-color:lightgrey" >
                            <td><?php echo $row['user_id']??""?></td>
                            <td><?php echo $row['role_id']??""?></td>
                            <td><?php echo $row['full_name']??""?></td>
                            <td><?php echo $row['email']??""?></td>
                            <td><?php echo $row['password']??""?></td>
                            <td>
                                <button class="btn btn-outline-success" type="submit"><a href="process.php?status=promote&user_id=<?php echo $row['user_id']?>">Promote</a></button>
                            </td>
                        </tr>
                        
                        <?php


                    }
                    ?>
              </tbody>
        </table>
             <?php
                }   
            
                    echo "<pre>";
                    print_r($row);
                    echo "</pre>";
            ?>

           
    
      </main>
    </div>
  
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