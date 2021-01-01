<?php
session_start();
?>
<?php
include_once 'includes/myDatabase.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="img">
            <img src="images/bug_fixing.svg">
		</div>
		<div class="login-content">
			<form action="includes/login.inc.php" method="POST">
				<img src="images/profile.svg">
                <h2 class="title">Welcome</h2>
                <h1 class="title">Log in</h1>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name='username'>
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
            	<a href="signup.php">Don't have account?</a>
            	<input type="submit" class="btn" value="Login" name="submit">
            </form>
            <?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields<p>";
    } else if ($_GET["error"] == "wronglogin") {
        echo "<p>Incorrect Login<p>";
    }
}
?>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
