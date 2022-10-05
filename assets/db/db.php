<?php
$server = "localhost";
$username = "root";
$pass = "";
$db_name = "files";

$conn = new mysqli ($server,$username,$pass,$db_name);

if($conn){
    // echo "connected successfully";
}
?>