<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="carpooldb";
    //$conn=new mysqli()
    $conn=new mysqli($servername,$username,$password,$dbname);
    if(!$conn)
{
    die('connection failed'.mysqli_error($conn));
}
?>