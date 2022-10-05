<?php
require "assets/db/db.php";
if (isset($_POST['id'])) {
    // echo $_POST['id'];
    $product = $_POST['id'];
    $id = $product['product_id'];
    $status = $product['status'];

    $sql = "UPDATE likes SET likes = '$status' WHERE id = '$id'";
    $result = $conn->query($sql);
    if($result){
        echo 'updated';
    }else{
        echo "failed";
    }
}
