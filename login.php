<?php

require_once 'head.php';

// redirect if logged in
if(isset($_SESSION['user'])) {
  header('Location: index.html');
  die;
}

// if HTTP POST
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(!isset($_POST['email']) && isset($_POST['password'])) {
    die('Email or password not provided.');
  }

  $email = $_POST['email'];
  $password = $_POST['password'];

  // get user from the database
  $sql = 'SELECT id, email, password, first_name, last_name, is_active FROM users WHERE email = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  $user = $stmt->fetch();

  // error message for username and password
  // never show which one is incorrect
  $errorMessage = 'Wrong username/password combination.';

  // if user doesn't exist
  if(!$user) { die($errorMessage); }

  // check is the user active
  if($user['is_active'] !== '1') {
    die('user not active');
  }

  // check if the password is OK
  if(!password_verify($password, $user['password'])) { die($errorMessage); }

  // log user in
  $_SESSION['user'] = $user;

  // redirect
  header('Location: index.html');
  die;
}

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
          <li><a href="users.php">Users</a></li>
          <li class="selected"><a href="login.php">Login</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="content">
	  
	  





<div class="container">
  <div class="row">
    <div class="col-md-12 login-wrapper">
      <h2 class="text-center">Welcome to VVG APP</h2>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h3 class="mb-0">Login</h3>
            </div>
            <div class="card-body">
              <form class="form" role="form" method="POST" action="login.php" autocomplete="off">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control form-control-lg rounded-0" name="email"
                         id="email" required="">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password"
                         class="form-control form-control-lg rounded-0" id="password" required="">
                </div>
                <button type="submit" class="btn btn-success float-right">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


	  




      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.html">Home</a> | <a href="contact.html">Contact Us</a> | <a href="users.html">Users</a> | <a href="login.html">Login</a></p>
      <p>Copyright &copy; Matea Sucec 2018</p>
    </div>
  </div>
</body>
</html>
