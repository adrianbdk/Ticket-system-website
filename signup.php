<?php
include_once 'header.php';
?>
<style>
input[type="username"]{
        border-bottom-left-radius: 0px;;
        border-bottom-right-radius: 0px;;
    }
    input[type="email"]{
        border-top-left-radius: 0px;;
        border-top-right-radius: 0px;;
        border-bottom-left-radius: 0px;;
        border-bottom-right-radius: 0px;;
        border-top: 0px;;
    }
    input[type="password"]{
        border-top-left-radius: 0px;;
        border-top-right-radius: 0px;;
        border-bottom-left-radius: 0px;;
        border-bottom-right-radius: 0px;;
        border-top: 0px;;

    }
    input[type="passwordrepeat"]{
        border-top-left-radius: 0px;;
        border-top-right-radius: 0px;;
        border-top: 0px;;
        input[type="password"];;


    }

</style>
<div class="text-center mt-5">

        <h1 class = "h3 mb-3 font-weight-normal">Sign Up</h1>
        <form action="includes/signup.inc.php" method="POST" style="max-width:480px;margin:auto;">
            <input type="text" class="form-control" name='username' placeholder="Username..." >

            <input type="text" class="form-control" name='email' placeholder="Email..." >

            <input type="password" class="form-control" name='pwd' placeholder="Password..." >

            <input type="password" class="form-control" name='pwdrepeat' placeholder="Repeat Password..." >
            <div class="mt-3">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign up</button>
            </div>
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