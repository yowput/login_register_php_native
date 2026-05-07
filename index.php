<?php
session_start();

// Jika sudah login langsung ke dashboard
if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit;
}

// Jika belum login ke login
header("Location: login.php");
exit;
