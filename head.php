<?php
session_start();
require_once 'db.php';
require_once 'constants.php';
require_once 'paginator.php';

$head = <<<EOT
<!doctype html>
<html lang="en">
<head>
<head>
	<title>LoremIpsum</title>
	<meta name="description" content="description" />
	<meta name="keywords" content="keywords, keywords" />
	<meta http-equiv="content-type" content="text/html; charset=windows-1252" />
	<link rel="stylesheet" type="text/css" href="style/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css">
</head>
<body>
EOT;

// inject title into '%s'
$head = sprintf($head, APP_NAME);
