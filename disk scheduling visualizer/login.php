<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$showError = false;

if (isset($_SESSION['username'])) {
    header("Location: /disk_scheduling/index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = new mysqli("localhost", "root", "", "disk_scheduling");
    if ($conn->connect_error) die("Database connection failed");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: /disk_scheduling/index.php");
            echo "Redirecting to: /disk_scheduling/index.php";
            exit();
        } else {
            $showError = "Password is incorrect.";
        }
    } else {
        $showError = "No such username exists.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login - Disk Scheduling</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header text-center">Login</div>
          <div class="card-body">
            <?php if ($showError): ?>
              <div class="alert alert-danger"><?= $showError ?></div>
            <?php endif; ?>
            <form method="POST" action="login.php">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <button class="btn btn-primary btn-block">Login</button>
              <a href="register.html" class="btn btn-link">New user? Register</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
