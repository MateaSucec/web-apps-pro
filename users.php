<?php
require_once 'head.php';

// redirect if not logged in
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  die;
}

echo $head;

// get users
$sql = 'SELECT id, email, first_name, last_name, is_active FROM users';

$isSearch = isset($_GET['q']);
if($isSearch) { $sql .= ' WHERE email LIKE :email'; }

$paginator = new Paginator($sql);
$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 5;
$offset = $page * $limit;

$stmt = $db->prepare($paginator->getPaginatedSQL());
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);

if($isSearch) {
  $search = "%{$_GET['q']}%";
  $stmt->bindParam(':email', $search);
}

$stmt->execute();
$users = $stmt->fetchAll();
?>





<!DOCTYPE HTML>
<html>

<head>
  <title>LoremIpsum</title>
  <meta name="description" content="description" />
  <meta name="keywords" content="keywords, keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="index.html">Lorem</a></h1>
          <h2>Ipsum</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="index.html">Home</a></li>
          <li><a href="contact.html">Contact Us</a></li>
          <li class="selected"><a href="users.php">Users</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="content">
    </div>

	  
	  
<div>
  <a href="add.php"><span class="oi oi-plus"></span></a>
  <table class="table table-hover">
    <thead>
    <tr>
      <th>#</th>
      <th>Email</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user): ?>
    <tr class="<?= $user['is_active'] === '1' ? '' : 'blocked' ?>">
      <th scope="row"><?= $user['id'] ?></th>
      <td><?= $user['email'] ?></td>
      <td><?= $user['first_name'] ?></td>
      <td><?= $user['last_name'] ?></td>
      <td>
        <a href="edit.php?id=<?= $user['id'] ?>"><span class="oi oi-pencil"></span></a>

        <?php $isMyId = $user['id'] === $_SESSION['user']['id']; ?>
        <?php if(!$isMyId): ?>
          <a href="delete.php?id=<?= $user['id'] ?>"><span class="oi oi-delete"></span></a>
          <?php if($user['is_active'] !== '1'): ?>
            <a href="change_activation.php?id=<?= $user['id'] ?>"><span class="oi oi-check"></span></a>
          <?php else: ?>
            <a href="change_activation.php?id=<?= $user['id'] ?>"><span class="oi oi-ban"></span></a>
          <?php endif; ?>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

	  
	  
	  
	  

	  <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.html">Home</a> | <a href="contact.html">Contact Us</a> | <a href="users.html">Users</a> | <a href="login.html">Login</a></p>
      <p>Copyright &copy; Matea Sucec 2018</p>
    </div>
  </div>
</body>
</html>
