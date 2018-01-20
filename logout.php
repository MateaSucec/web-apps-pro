<?php
require_once 'head.php';
unset($_SESSION['user']);
header('Location: login.php');
die;
?>