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

$permission = 'User';
$profilePhoto = 'images/user_profile_pics/default.jpg';
function createUser($conn, $username, $pwd, $email, $permission, $profilePhoto)
{

    $sql = "INSERT INTO Uzytkownik (Login, Haslo, Mail, permissions, profile_photo, display_name) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $username, $hashedPwd, $email, $permission, $profilePhoto, $username);
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


function time_ago($custom_time)
{
    $custom_time = strtotime($custom_time);

    $date_time_now_string = date('Y-m-d H:i:s');

    $date_time_now = strtotime($date_time_now_string);

    $time = $date_time_now - $custom_time;
    if ($time < 60) {
        return '0 minutes';
    }
    $timer_count = array(365 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60 => 'month',
        24 * 60 * 60 => 'day',
        60 * 60 => 'hour',
        60 => 'minute');

    $timer_code = array('year' => 'years',
        'month' => 'months',
        'day' => 'days',
        'hour' => 'hours',
        'minute' => 'minutes');

    $final_time = '';
    foreach ($timer_count as $key => $value) {
        $dates = $time / $key;
        if ($dates >= 1) {
            $round_of = floor($dates);

            $time_remove = $round_of * $key;

            if (($time - $round_of) < 0) {
                $time -= ($round_of - 1) * $key;
            } else {
                $time -= $time_remove;
            }

            $final_time = $final_time . $round_of . ' ' . ($round_of > 1 ? $timer_code[$value] : $value) . ' ';

        }
    }
    return $final_time . ' ago';
}

function time_ago_profile($custom_time)
{
    $custom_time = strtotime($custom_time);

    $date_time_now_string = date('Y-m-d H:i:s');

    $date_time_now = strtotime($date_time_now_string);

    $time = $date_time_now - $custom_time;
    if ($time < 1) {
        return '0 seconds';
    }
    $timer_count = array(365 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60 => 'month',
        24 * 60 * 60 => 'day',);

    $timer_code = array('year' => 'years',
        'month' => 'months',
        'day' => 'days');

    $final_time = '';
    foreach ($timer_count as $key => $value) {
        $dates = $time / $key;
        if ($dates >= 1) {
            $round_of = floor($dates);

            $time_remove = $round_of * $key;

            if (($time - $round_of) < 0) {
                $time -= ($round_of - 1) * $key;
            } else {
                $time -= $time_remove;
            }

            $final_time = $final_time . $round_of . ' ' . ($round_of > 1 ? $timer_code[$value] : $value) . ' ';

        }
    }
    return $final_time . ' ago';
}



