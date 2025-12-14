<?php
session_start(); // ✅ Start the session
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // ✅ Store user session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirect to index
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Wrong username or password');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: wheat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .login-container {
            max-width: 400px;
            margin: 70px auto;
            background: wheat;
            padding: 30px;
            border: #333;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        h3 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 94%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #a26b1d;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #8b5612;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            text-align: center;
            margin-top: 15px;
            color: #333;
        }

        @media (max-width: 768px) {
            .login-container {
                margin: 40px 20px;
                padding: 25px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h3>Login</h3>
        <form method="post">
            <label for="username">Username</label>
            <input name="username" type="text" id="username" required>

            <label for="password">Password</label>
            <input name="password" type="password" id="password" required>

            <button type="submit">Login</button>

            <p><a href="register.php">Create new Account</a></p>
        </form>
    </div>
</body>
</html>
