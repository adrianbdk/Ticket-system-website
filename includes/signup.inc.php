<?php

if (isset($_POST["submit"])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];
    $permissions = 'User';
    $profilePhoto = '/images/user_profile_pics/default.jpg';

    require_once 'myDatabase.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($username, $email, $pwd, $pwdrepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdrepeat) !== false) {
        header("location: ../signup.php?error=pwdsdontmatch");
        exit();
    }

    if (userExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $username, $pwd, $email, $permissions, $profilePhoto);

} else {header("location: ../login.php");
    exit();
}
