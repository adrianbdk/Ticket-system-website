<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="images/bug_fixing.svg">
	<div class="container">
		<div class="img">

		</div>
		<div class="login-content">
			<form action="includes/login.inc.php" method="POST">
				<img src="images/profile.svg">
                <h2 class="title">Sign in</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name='username'>
           		   </div>
                </div>
                <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="text" class="input" name='email'>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name='pwd'>
                   </div>

                </div>
                <div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Repeat password</h5>
           		    	<input type="password" class="input" name='pwdrepeat'>
                   </div>

            	</div>
            	<a href="login.php">Already have an account?</a>
            	<input type="submit" class="btn" value="Sign up" name="submit">
            </form>
            <?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields<p>";
    } else if ($_GET["error"] == "invaliduid") {
        echo "<p>Chooose a proper username<p>";
    } else if ($_GET["error"] == "invalidemail") {
        echo "<p>Chooose a proper email<p>";
    } else if ($_GET["error"] == "pwdsdontmatch") {
        echo "<p>Passwords doesn't match<p>";
    } else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong, try again<p>";
    } else if ($_GET["error"] == "usernametaken") {
        echo "<p>Username already taken<p>";
    } else if ($_GET["error"] == "none") {
        echo "<p>You have signed up!<p>";
    }
}
?>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
