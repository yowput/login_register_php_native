<?php
session_start();
require_once __DIR__ . '/config.php';
$message = "";

if (isset($_POST['register'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // cek username
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($check) > 0) {
        $message = "Username sudah digunakan!";
    } else {

        $query = "INSERT INTO users(username, password)
                  VALUES('$username','$password')";

        if (mysqli_query($conn, $query)) {

            header("Location: login.php");
            exit;
        } else {
            $message = "Register gagal!";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h2>Register</h2>

        <p><?= $message ?></p>

        <form method="POST">

            <input type="text"
                name="username"
                placeholder="Username"
                required>

            <input type="password"
                name="password"
                placeholder="Password"
                required>

            <button type="submit" name="register">
                Register
            </button>

        </form>

        <a href="login.php">Sudah punya akun? Login</a>

    </div>

</body>

</html>