<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Hyper Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .register-container {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
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
      background-color: #4f46e5;
    }
  </style>
</head>

<body>
  <div class="register-container">
    <h3 class="mb-4 text-center">Register</h3>
    <p class="text-center text-danger">
      <?php echo $_GET['msg'] ?? ""; ?>
    </p>
    <form method="POST" action="process.php">
      <div class="mb-3">
        <label for="username" class="form-label">Name</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your name here..." required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email here..." required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password here..." required>
      </div>
      <button type="submit" class="btn btn-primary w-100" name="submit" value = "Register">Register</button>
      <div class="mt-3 text-center">
        <span>Already have an account? <a href="login.php" class="text-decoration-none">Login here</a></span>
      </div>
    </form>
  </div>
</body>

</html>
