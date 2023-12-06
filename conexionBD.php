<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "users_crud_php";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function connection(){
        $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tallerweb";
    
        $connect=mysqli_connect($servername, $username, $password);
    
        mysqli_select_db($connect, $dbname);
    
        return $connect;
    
    }
    
?>