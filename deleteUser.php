<?php
require 'includes/myDatabase.inc.php';
require 'includes/functions.inc.php';
$userId = $_POST['delete_id'];
$conn->query("DELETE FROM Uzytkownik WHERE uzytkownik_id = '{$userId}'");
$conn->query("DELETE FROM Blad WHERE uzytkownik_id = '{$userId}'");
header("location: dashboard.php?error=userdeleted");
exit();