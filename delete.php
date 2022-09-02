<?php
    session_start();
    // echo $_GET["id"];
    $id = $_GET["id"];
    // echo $id;
    include 'db.php';
    $sql = "DELETE FROM `books` WHERE sno = '$id' ";
    $exist = mysqli_query($conn,$sql);
    header("location: show.php");
    // exit;

?>


