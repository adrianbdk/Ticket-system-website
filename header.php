<?php
session_start();
?>
<?php
include_once 'includes/myDatabase.inc.php';
?>
<!Doctype html>
<html>
<head>
    <title>Projekt IAB</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php
if (isset($_SESSION["userid"])) {
    echo "<li class='nav-item'>
                <a class='nav-link' href='profile.php'>Profile Page</a>
              </li>";
    echo "<li class='nav-item'>
                <a class='nav-link' href='includes/logout.inc.php'>Log Out</a>
              </li>";
} else {
    echo "<li class='nav-item'>
                <a class='nav-link' href='login.php'>Login</a>
              </li>";
    echo "<li class='nav-item'>
                <a class='nav-link' href='signup.php'>Signup</a>
              </li>";

}
?>
    </ul>
  </div>
</nav>

<div class="wrapper">