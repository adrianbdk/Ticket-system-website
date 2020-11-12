<!DOCTYPE html>
<html>
<head>
    <title>Projekt IAB</title>
</head>
<body style = "background-color:#bdc3c7">
<div id="main-wrapper">
    <form action = "index.php" method="post">

        <label><b>Product ID
</div>
</body>
<?php
function connectWithDatabase() {
    $link = mysqli_connect("localhost", "root", "", "Projekt");
    if (mysqli_connect_errno()) 
    {
        echo "Błąd połączenia nr: " . mysqli_connect_errno();
        echo "Opis błędu: " . mysqli_connect_error();
        exit();
    }
    mysqli_query($link, 'SET NAMES utf8');
	mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = utf8_polish_ci");
    return $link;
}
?>

</html>
