<?php

function emptyInputSignup($username, $pwd, $email, $pwdrepeat)
{
    if (empty($username) || empty($email) || empty($pwd) || empty($pwdrepeat)) {
        return true;

    } else {
        return false;
    }

    return false;
}

function invalidUid($username)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return true;
    } else {
        return false;
    }
    return false;
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
    return false;
}

function pwdMatch($pwd, $pwdrepeat)
{
    if ($pwd !== $pwdrepeat) {
        return true;
    } else {
        return false;
    }
    return false;
}

function userExists($conn, $username, $email)
{
    $sql = "SELECT * FROM Uzytkownik WHERE Login = ? OR Mail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $pwd, $email)
{

    $sql = "INSERT INTO Uzytkownik (Login, Mail, Haslo) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd)
{
    if (empty($username) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
    return false;
}

function loginUser($conn, $username, $pwd)
{
    $uidExists = userExists($conn, $username, $username);
    if (uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["Haslo"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["uzytkownik_id"];
        $_SESSION["login"] = $uidExists["Login"];
        header("location: ../support-ticket.php");
    }

}
