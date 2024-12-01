<?php
define('CONTEXT', 'other');

require "../backend/config.php";
session_start();

if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>