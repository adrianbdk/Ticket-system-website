<?php
if (isset($_POST['submit'])) {

    $file = $_FILES[['file']];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/ticketsAttachments/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("location: support-ticket.php?upload-success");
            } else {
                echo "This size of file is not allowed!";
            }

        } else {
            echo "There was an arror uploading your file!";
        }

    } else {
        echo "you cannot upload files of this type!";
    }
}
