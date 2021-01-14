<?php
if (isset($_POST['submit'])) {

    require_once 'includes/myDatabase.inc.php';
    require_once 'includes/functions.inc.php';

    $permission = $_POST['permissions'];
    $username = $_POST['username'];

    updatePermission($conn, $username, $permission);
}
