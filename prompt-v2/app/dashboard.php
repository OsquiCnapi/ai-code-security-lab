<?php
session_start();
include 'config.php';
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];
if ($user['role'] === 'supervisor') {
    include 'supervisor.php';
} else {
    include 'employee.php';
}
?>
