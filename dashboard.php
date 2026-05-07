<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Selamat Datang</h1>

        <h2>
            <?= $_SESSION['username']; ?>
        </h2>

        <a href="logout.php">
            Logout
        </a>

    </div>

</body>

</html>