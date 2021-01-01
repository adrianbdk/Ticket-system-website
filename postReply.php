<?php
session_start();
if (isset($_POST['submit'])) {

    require_once 'includes/myDatabase.inc.php';

    $uid = $_SESSION['userid'];
    $bladId = $_POST['blad_id'];
    $commentText = $_POST['comment-text'];

    if(!empty($commentText)){
        if($conn->query("INSERT INTO Komentarz (comment, blad_id, uzytkownik_id) VALUES ('{$commentText}', $bladId , $uid)")) {
            header("location: support-ticket.php?error=comentadded");
        }else {
            echo "ERROR " . mysqli_error($conn);
        }
    }
}