<?php
session_start();
require_once("require/database_connection.php");

if (isset($_SESSION["user"]) && $_SESSION["user"]['role_id'] == 2) {
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
          <p class="fw-bold text-uppercase mt-4">Users</p>
          <a href="#"><i class="bi bi-calendar"></i> Admins</a>
          <a href="#"><i class="bi bi-calendar"></i> Users</a>
          <p class="fw-bold text-uppercase mt-4">Logout</p>
          <a href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>    
        </nav>

        <!-- Main Content -->
        <main class="col-md-10 p-4">

          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">ICREATIVEZ</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Admins</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Users</a>
                  </li>
                </ul>
                <a class="btn btn-outline-danger" href="logout.php">Logout</a>
              </div>
            </div>
          </nav>

          <!-- Welcome Message -->
          <div class="h4 pb-2 mt-4 text-primary-emphasis border-top border-success">
            Hello, Welcome... <?php echo $_SESSION['user']['full_name'] ?? ""; ?>
          </div>

          <?php
          $query = "SELECT * FROM users WHERE user_id != '{$_SESSION["user"]["user_id"]}'";
          $result = mysqli_query($connection, $query);
          $all_users = mysqli_fetch_all($result, MYSQLI_ASSOC);
          ?>

          <!-- All Users Table -->
          <h4 class="mt-4">Users</h4>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>User ID</th>
                <th>Role ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Promote</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($all_users as $row){ 
               if ($row['role_id'] != '1') continue; ?>
              <tr style="background-color:lightgrey">
                  <td><?= $row['user_id'] ?? '' ?></td>
                  <td><?= $row['role_id'] ?? '' ?></td>
                  <td><?= $row['full_name'] ?? '' ?></td>
                  <td><?= $row['email'] ?? '' ?></td>
                  <td><?= $row['password'] ?? '' ?></td>
                  <td>
                      <a href="process.php?status=promote&user_id=<?= $row['user_id'] ?>" class="btn btn-outline-success">Promote</a>
                  </td>
              </tr>
            <?php } ?>

            </tbody>
          </table>

          <!-- Admins Table -->
          <div class="card mt-4">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>User ID</th>
                    <th>Role ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($all_users as $row){
                     if ($row['role_id'] != '2') continue; ?>
                    <tr style="background-color:lightgrey">
                      <td><?= $row['user_id'] ?? '' ?></td>
                      <td><?= $row['role_id'] ?? '' ?></td>
                      <td><?= $row['full_name'] ?? '' ?></td>
                      <td><?= $row['email'] ?? '' ?></td>
                      <td><?= $row['password'] ?? '' ?></td>
                      
                    </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>

        </main>
      </div>
    </div>
  </body>
  </html>

<?php
} elseif (isset($_SESSION["user"]) && $_SESSION['user']["role_id"] == 1) {
    header("location: user_dashboard.php");
    exit;
} else {
    header("location: login.php?msg=Login First&color=red");
    exit;
}
?>
