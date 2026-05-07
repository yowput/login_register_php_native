<?php
session_start();
require_once __DIR__ . '/config.php';
$message = "";

if (isset($_POST['login'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE username='$username'"
    );

    if (mysqli_num_rows($query) > 0) {

        $user = mysqli_fetch_assoc($query);

        if (password_verify($password, $user['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['username'] = $user['username'];

            header("Location: dashboard.php");
            exit;
        } else {
            $message = "Password salah!";
        }
    } else {
        $message = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h2>Login</h2>

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

            <button type="submit" name="login">
                Login
            </button>

        </form>

        <a href="register.php">Belum punya akun? Register</a>

    </div>

</body>

</html>