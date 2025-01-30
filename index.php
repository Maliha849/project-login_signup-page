<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      echo "Login successful!";
    } else {
      echo "Invalid password!";
    }
  } else {
    echo "No user found!";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Login Page</title>
</head>
<body>
  <div class="form-container">
    <h2>Login</h2>
    <form action="index.php" method="post">
      <div class="input-group">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="password">Password:</label>
        <input type="password" name="password" required>
      </div>
      <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
  </div>
</body>
</html>
