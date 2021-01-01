
<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ProjektIAB";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
// function connectWithDatabase() {
//     $link = mysqli_connect("localhost", "root", "", "Projekt");
//     if (mysqli_connect_errno()) 
//     {
//         echo "Błąd połączenia nr: " . mysqli_connect_errno();
//         echo "Opis błędu: " . mysqli_connect_error();
//         exit();
//     }
//     mysqli_query($link, 'SET NAMES utf8');
// 	mysqli_query($link, 'SET CHARACTER SET utf8');
//     mysqli_query($link, "SET collation_connection = utf8_polish_ci");
//     return $link;
// }

