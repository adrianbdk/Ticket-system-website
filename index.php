<?php
    include_once 'header.php';
?>     

 <?php
    $data = "costam";
    //
    $sql = "SELECT * FROM Uzytkownik WHERE Login=?;";
    //Statement
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Statement failed!";
        
    } else{
        //bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, "s", $data);
        //run parameters inside database
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            echo $row['Login']. "<br>";
        }
    }

?>

</body>
</html>
