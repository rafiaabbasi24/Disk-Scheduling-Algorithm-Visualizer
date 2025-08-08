<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /disk_scheduling/login.php");
    exit();
}
?>
