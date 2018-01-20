<?php
require_once 'head.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(!isset($_POST['email']) || !isset($_POST['password'])) {
        die('email or password not set');
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $isActive = $_POST['is-active'];

    if($password !== $passwordRepeat) {
        die('password and password repeat are not the same');
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO users (email, password, first_name, last_name, is_active) VALUES
            (:email, :password, :first_name, :last_name, :is_active)';

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':is_active', $isActive);
    $stmt->execute();

    header('Location: users.php');
    die;
}


echo $head;
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
          <li><a href="login.php">Login</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div>




<div class="container">
  <div class="row">
    <div class="col-md-12 login-wrapper">
      <h2 class="text-center">Add user</h2>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <form class="form" role="form" method="POST" action="add.php" autocomplete="off">
                <div class="form-group">
                <input type="hidden" name="id" />
                  <label for="email">Email</label>
                  <input type="email" class="form-control form-control-lg rounded-0" name="email"
                         id="email" required="">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password"
                         class="form-control form-control-lg rounded-0" id="password" required="">
                </div>
                <div class="form-group">
                  <label for="password-repeat">Password repeat</label>
                  <input type="password" name="password-repeat"
                         class="form-control form-control-lg rounded-0" id="password-repeat" required="">
                </div>
                <div class="form-group">
                  <label for="first-name">First name</label>
                  <input type="text" name="first-name"
                         class="form-control form-control-lg rounded-0" id="first-name">
                </div>
                <div class="form-group">
                  <label for="last-name">Last name</label>
                  <input type="text" name="last-name"
                         class="form-control form-control-lg rounded-0" id="last-name">
                </div>
                <div class="form-check">
                  <div>Is Active?</div>
                  <label class="form-check-label" for="is-active">
                    <input class="form-check-input" type="radio" name="is-active" id="is-active" value="0" checked>
                    No
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label" for="is-active">
                    <input class="form-check-input" type="radio" name="is-active" id="is-active" value="1">
                    Yes
                  </label>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
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