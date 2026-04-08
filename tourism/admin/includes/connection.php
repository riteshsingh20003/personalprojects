<?php 
$server = "localhost";
$username = "root";
$password= "";
$database = "project";
$conn = mysqli_connect($server,$username,$password,$database);
if (!$conn) {
    mysqli_error();
    ECHO "Not Connected to DataBase";
}
?>