<?php

    function emptyInputSignup($username, $pwd, $email, $pwdrepeat){
        $result;
        
        if(empty($username) || empty($email) || empty($pwd) || empty($pwdrepeat)){
            $result = true;
            
        }
        else{
            $result = false;
        }

        return result;
    }

    function invalidUid($username){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $result = true;
        }
        else{
            $result = false;
        }
        return result;
    }

    function invalidEmail($email){
        $result;
        if(!filter_var($emil, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }
        else{
            $result = false;
        }
        return result;
    }

    function pwdMatch($pwd, $pwdrepeat){
        $result;
        if($pwd !== $pwdrepeat){
            $result = true;
        }
        else{
            $result = false;
        }
        return result;
    }

    function userExists($conn, $username, $email){
        $sql = "SELECT * FROM Uzytkownik WHERE Login = ? OR Email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $username, $pwd, $email){
        
        $sql = "INSERT INTO Uzytkownik (Login, Mail, Haslo) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
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
    