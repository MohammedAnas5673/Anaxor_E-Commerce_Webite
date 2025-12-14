<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: wheat;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #222;
      font-size: 30px;
    }

    form {
      width: 500px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #333;
      font-size: 15px;
    }

    input, textarea {
      width: 100%;
      padding: 12px;
      border: 2px solid #d2a96b;
      border-radius: 10px;
      font-size: 15px;
      background-color: #fff7e0;
      transition: border-color 0.3s ease;
    }

    input:focus, textarea:focus {
      border-color: #a26b1d;
      outline: none;
    }

    textarea {
      height: 120px;
      resize: none;
    }

    button {
      width: 100%;
      background-color: #a26b1d;
      color: white;
      font-size: 17px;
      font-weight: 600;
      padding: 12px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #8b5612;
    }

    .login-link {
      text-align: center;
      margin-top: 18px;
    }

    .login-link a {
      text-decoration: none;
      color: #a26b1d;
      font-weight: 500;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    .error {
      color: red;
      text-align: center;
      margin-bottom: 15px;
    }

  </style>
</head>
<body>

<?php  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // Password match check
    if ($password !== $repassword) {
        echo "<p class='error'>❌ Passwords do not match. Please try again.</p>";
    } else {
        $password = mysqli_real_escape_string($conn, $password);
        $firstname = mysqli_real_escape_string($conn, $firstname);
        $lastname = mysqli_real_escape_string($conn, $lastname);
        $username = mysqli_real_escape_string($conn, $username);

        $query = "INSERT INTO user (firstname, lastname, username, password) 
                  VALUES ('$firstname', '$lastname', '$username', '$password')";
        if (mysqli_query($conn, $query)) {
            header('Location: login.php');
            exit();
        } else {
            echo "<p class='error'>❌ Registration failed. Try again later.</p>";
        }
    }
}
?>

  <h2>Create Your Account</h2>

  <form method="post" onsubmit="return validatePasswords()">
    <div class="form-group">
      <label>First Name</label>
      <input type="text" name="firstname" placeholder="Enter your first name" required>
    </div>

    <div class="form-group">
      <label>Last Name (optional)</label>
      <input type="text" name="lastname" placeholder="Enter your last name">
    </div>

    <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" placeholder="Choose a username" required>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" id="password" name="password" placeholder="Create a password" required>
    </div>

    <div class="form-group">
      <label>Re-enter Password</label>
      <input type="password" id="repassword" name="repassword" placeholder="Re-enter your password" required>
    </div>

    <button type="submit">Register</button>

    <div class="login-link">
      <p><a href="login.php">Already have an account? Login</a></p>
    </div>
  </form>

  <script>
    function validatePasswords() {
      const pass = document.getElementById('password').value;
      const repass = document.getElementById('repassword').value;

      if (pass !== repass) {
        alert('Passwords do not match!');
        return false;
      }
      return true;
    }
  </script>

</body>
</html>
