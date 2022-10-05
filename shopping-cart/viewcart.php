<?php
include '../assets/db/db.php';
session_start();
// echo "<pre>";
//  print_r($_SESSION['carts']);

 $arr = $_SESSION['carts'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addtocart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/53a10f910c.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">

        <div class='mt-4 text-center bg-warning p-4'>
            <h1>Add to Cart <i class="fa-solid fa-cart-shopping fs-2 text-dark bg-warning p-2"></i></h1>
        </div>

        <div class='mt-4'>
            <a href="index.php" class='btn btn-primary'>HOME</a>
        </div>


        
    <div>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            <?php

                if(isset($_GET['del'])){
                    // echo "hiiiii";
                    foreach ($_SESSION['carts'] as $key => $value) {
                        // echo $value['id'];
                        if($value['id'] == $_GET['del']){
                            // echo "true";
                            unset($_SESSION['carts'][$key]);
                        }

                    }
                }
             
                if(!empty($_SESSION['carts'])){
                    // print_r($_SESSION['carts']);
                    $total = 0;
                    foreach($_SESSION['carts'] as $key=>$value){
                        // echo $value["title"];
                        $amount = $value['quan'] * $value['price'];
                        $total += $amount;
                        echo '
                         <div class="col">
                        <div class="card">
                            <img src="../assets/image/'.$value['image'].'" class="card-img-top w-75 " alt="...">
                            <div class="card-body">
                                <h3 class="card-title">'.$value["title"].'</h3>
                                <p class="card-text fs-4"><s>200</s><b class="ms-3 text-danger">Rs:'.$value['price'].' </b></p>
                                <h5>Quantity : '.$value["quan"].'</h5>
                                <h5>Amount : ₹ '.$amount.'</h5>
                                <a href="viewcart.php?del='.$value['id'].'" class="btn btn-danger mt-2 ms-3" >Remove </a>

                            </div>
                        </div>
                    </div>'
                    ;
                    
                    }

                   
                   
                }else{
                    echo ' <h4 class="text-center bg-light p-4 w-100">Your Cart is Empty</h4>';
               }


            ?>
           
    </div>

    <?php
    
     if(empty($total)){
        echo "";
     }else{
        echo "<h1>Total Cart Amount : <span class='fw-bold  '>₹ $total</span></h1>";
     }

?>






    </div>




</body>

</html>