<?php
    if(isset($_POST["submit"])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd= mysqli_real_escape_string($conn,$_POST['pwd']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
    $pwdrepeat = mysqli_real_escape_string($conn,$_POST['pwdrepeat']);
    require_once 'myDatabase.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($username, $pwd, $email, $pwdrepeat) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if(invalidUid($username) !== false){
        header("location: ../signup.php?error=invalidlogin");
        exit();
    }

    if(pwdMatch($pwd, $pwdrepeat) !== false){
        header("location: ../signup.php?error=passworddontmatch");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidmail");
        exit();
    }
    
    if(userExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $username, $pwd, $email);
    
    } else{
        header("location: ../signup.php");
        exit();
    }



    