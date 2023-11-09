<?php
session_start();
if (!isset($_SESSION['logerId'])) {
    session_destroy();
    header('location: index.php');
} else {
    $staffId = $_SESSION['logerId'];
    $staffName = $_SESSION['name'];
    $role = $_SESSION['role'];
    $rank = $_SESSION['rank'];
}
?>

