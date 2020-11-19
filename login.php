<?php
include_once 'header.php';
?>

<div class="text-center mt-5">

        <h1 class = "h3 mb-3 font-weight-normal">Log In</h1>
        <form action="includes/login.inc.php" method="POST" style="max-width:480px;margin:auto;">
            <input type="text" class="form-control" name='username' placeholder="Username/Email..." >
            <input type="password" class="form-control" name='pwd' placeholder="Password..." >
            <div class="mt-3">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Log In</button>
            </div>
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