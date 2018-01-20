<?php
require_once 'head.php';
if(!isset($_GET['id'])) {
  die('there is no ID parameter');
}

$id = (int)$_GET['id'];
$logiraniId = (int)$_SESSION['user']['id'];

if($id === $logiraniId) {
    die('you cannot delete yourself');
}

$sql = 'DELETE FROM users WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('Location: users.php');
die();
