<?php
include_once 'header.php';
?>

<section>
<?php
if (isset($_SESSION["userid"])) {
    echo "<p> Welcome " . $_SESSION["login"] . "</php>";
}
?>
</section>
