<?php
require 'includes/myDatabase.inc.php';
require 'includes/functions.inc.php';
$bladId = $_POST['delete_id'];

$conn->query("DELETE FROM Blad WHERE blad_id = '{$bladId}'");
header("location: dashboard.php?error=ticketdeleted");

exit();