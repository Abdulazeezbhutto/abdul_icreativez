<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Hyper Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #6366f1;
    }

    .btn-primary {
      background-color: #6366f1;
      border: none;
    }

    .btn-primary:hover {
      background-color: #2C2F3A !important;
    }
  </style>
</head>

<body>
  <div class="login-container">
    
    <h3 class="mb-4 text-center">Sign In to Icreativez</h3>
    <form method="POST" action="process.php">
        <p style = "color:<?php echo $_GET['color']??""?>"> <?php echo $_GET['msg']??""?></p>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100" name = "submit" Value = "Login">Login</button>
      <div class="mt-3 text-center">
        <span>Don't have an account? <a href="register.php" class="text-decoration-none" >Register</a></span>
      </div>
    </form>
  </div>
</body>

</html>
