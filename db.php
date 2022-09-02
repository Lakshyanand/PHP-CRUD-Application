<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "library";

    $conn = mysqli_connect($servername,$username,$password,$database);
    // if($conn)
    // {
    //     echo "connected successfully";
    // }
    // else
    // {
    //     die("connection failed:". mysqli_connect_query());
    // }
    if(!$conn)
    {
        die("connection failed:". mysqli_connect_query());
    }
?>