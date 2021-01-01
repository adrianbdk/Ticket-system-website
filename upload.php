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

    $categoryName = $_POST['category'];

    $gameName = $_POST["game"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $date = date('Y-m-d H:i:s');

    $resultCategory = $conn->query("SELECT * FROM KategoriaBledu WHERE Nazwa = '{$categoryName}'");
    $resultGame= $conn->query("SELECT * FROM Gra WHERE Nazwa = '{$gameName}'");

    $rowCategory = $resultCategory->fetch_assoc();
    $rowGame = $resultGame->fetch_assoc();


    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/Tickets Attachments/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                createTicket($conn, $title, $rowGame['gra_id'], $rowCategory['kategoriaBledu_id'], 1, $uid, $description, $fileDestination, $date);

            } else {
                echo "This size of file is not allowed!";
            }

        } else {
            echo "There was an arror uploading your file!";

        }

    } else {
        echo "You cannot upload files of this type!";
        echo '</br>' . " Game Value is : " . $categoryName;
        echo '</br>' . " Game Value is : " . $gameName;
        echo '</br>' . " Description Value is : " . $description;
        echo '</br>' . " Title Value is : " . $title;
        echo '</br>' . " UserId Value is : " . $uid;
        echo '</br>' . " Row Game: " . $rowGame['gra_id'];
        echo '</br>' . " Row Category: " . $rowCategory['kategoriaBledu_id'];
    }
}

function createTicket($conn, $title, $gameId, $categoryId, $statusId, $uId, $description, $attachmentPath, $date){
    if($conn->query("INSERT INTO Blad (title, gra_id, kategoriaBledu_id, statusBledu_id, uzytkownik_id, description, attachment, date) VALUES ('$title', $gameId, $categoryId,
        $statusId, $uId, '$description', '$attachmentPath', '$date')")) {
        header("location: support-ticket.php?error=ticketuploaded");
    }else {
            echo "ERROR " . mysqli_error($conn);
        }
    }

