<?php
session_start();
if (isset($_POST['submit'])) {

    require_once 'includes/myDatabase.inc.php';


    $uid = $_SESSION['userid'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');


    if(isset($_POST['new_username']) && isset($_FILES['file'])){
        if($conn->query("UPDATE Uzytkownik
                            SET display_name = '{$_POST['new_username']}'
                            WHERE uzytkownik_id = '{$uid}'")){
            header("location: profile.php?error=settingsaccepted");
        }else {
            echo "ERROR " . mysqli_error($conn);
        }

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 500000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'images/user_profile_pics/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    if($conn->query("UPDATE Uzytkownik
                            SET profile_photo = '{$fileDestination}'
                            WHERE uzytkownik_id = '{$uid}'")){
                        header("location: profile.php?error=settingsaccepted");
                    }else {
                        echo "ERROR " . mysqli_error($conn);
                    }

                } else {
                    echo "This size of file is not allowed!";
                }

            } else {
                echo "There was an arror uploading your file!";

            }

        } else {
            echo "You cannot upload files of this type!";

        }
    }else if (isset($_POST['new_username']) && !isset($_FILES['file'])){
        if($conn->query("UPDATE Uzytkownik
                            SET display_name = '{$_POST['new_username']}'
                            WHERE uzytkownik_id = '{$uid}'")){
            header("location: profile.php?error=settingsaccepted");
        }else {
            echo "ERROR " . mysqli_error($conn);
        }
    }else if(!isset($_POST['new_username']) && isset($_FILES['file'])){
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 500000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'images/user_profile_pics/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    if($conn->query("UPDATE Uzytkownik
                            SET profile_photo = '{$fileDestination}'
                            WHERE uzytkownik_id = '{$uid}'")){
                        header("location: profile.php?error=settingsaccepted");
                    }else {
                        echo "ERROR " . mysqli_error($conn);
                    }

                } else {
                    echo "This size of file is not allowed!";
                }

            } else {
                echo "There was an arror uploading your file!";

            }

        } else {
            echo "You cannot upload files of this type!";

        }
    }else if (!isset($_POST['new_username']) && !isset($_FILES['file'])){
        header("location: profile.php");
    }
}
