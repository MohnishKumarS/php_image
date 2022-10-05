<?php
include("../assets/db/db.php");

$getmsg =mysqli_real_escape_string($conn,$_POST['text']);
// $getmsg = $_POST['text'];
// echo $getmsg;

$check = "SELECT reply from chat where query like '%$getmsg%'";
$result = $conn->query($check);

if($result->num_rows > 0 ){
// echo $getmsg;
$row = $result->fetch_assoc();
$reply = $row['reply'];
echo $reply;

}else{
    echo "sorry can't able to understand";
}





?>