<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "Signup successful!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
  <title>Signup Page</title>
</head>
<body>
  <div class="form-container">
    <h2>Signup</h2>
    <form action="signup.php" method="post">
      <div class="input-group">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="password">Password:</label>
        <input type="password" name="password" required>
      </div>
      <button type="submit">Signup</button>
    </form>
    <p>Already have an account? <a href="index.php">Login</a></p>
  </div>
</body>
</html>
