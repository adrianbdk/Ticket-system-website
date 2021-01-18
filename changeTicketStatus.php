<?php
if (isset($_POST['submit'])) {

    require_once 'includes/myDatabase.inc.php';
    require_once 'includes/functions.inc.php';

    $ticketId = $_POST['ticketId'];
    $statusPost = $_POST['status'];

    $resultStatus = $conn->query("SELECT statusBledu_id from StatusBledu 
                                    WHERE Nazwa = '{$statusPost}'");
    $statusArray = $resultStatus->fetch_assoc();
    $status = $statusArray['statusBledu_id'];


    updateTicketStatus($conn, $ticketId, $status);
}
