<?php
session_start();
require 'component.php';
require '../assets/db/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/53a10f910c.js" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand fs-3 fw-bold m-auto">Shopping card</a>



            <a class='fs-4 bg-warning rounded-pill px-3 btn ' href='viewcart.php'><i class="fa-solid fa-cart-shopping text-dark "></i>Cart 
            <?php
            if(isset($_SESSION['carts'])){
                $count = count($_SESSION['carts']);
                echo $count;
            }else{
                echo "0";
            }
            ?></a>

        </div>
    </nav>

    <div class='container'>
        <div class="row row-cols-1 row-cols-md-3 g-5 mt-5 p-3">
            <?php

            $sql = "SELECT * from cart";
            $result = $conn->query($sql);
            if($result->num_rows > 0 ){
                while($row = $result->fetch_assoc()){
                    // echo $row['title'];
                    component("../assets/image/$row[image]","$row[title]","$row[price]","$row[id]");
                }
            }

                    
            if(isset($_GET['add'])){
                // echo "success";
                $id = $_GET['id'];
                
                $quan =  $_GET['quantity'];
                // echo $quan;
                // print_r($_SESSION['card']);
            //   $_SESSION = [];

                if(isset($_SESSION['carts'])){
                    // echo "empty";
                    $arr = array_column($_SESSION['carts'],'id');
                    // // print_r($arr);
                       if(in_array($id,$arr)){
                        echo "<script> alert('Already Product Added '); </script>";

                       }else{
                        // echo "no added";
                        $count = count($_SESSION['carts']);
                        // echo $count;

                        $sql = "SELECT * from cart where id = '$id' ";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        // echo $row["title"];
                        $item = array(
                                    "id"=>"$id",
                                    "title"=>"$row[title]",
                                    "price"=>"$row[price]",
                                    "image"=>"$row[image]",
                                    "quan"=>"$quan"
    
                            
                                );
                           $_SESSION['carts'][$count] = $item;
                           echo "<script> alert('Product Added Successfully'); </script>";
                        //    header("location:viewcart.php");
                           
                       }

                    
                }
                else{
                    // echo "full";
                    $sql = "SELECT * from cart where id = '$id' ";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    // echo $row["title"];
                    $item = array(
                                "id"=>"$id",
                                "title"=>"$row[title]",
                                "price"=>"$row[price]",
                                "image"=>"$row[image]",
                                "quan"=>"$quan"

                        
                            );
                            // echo "<pre>";
                            //       print_r($item);
                            //   echo "</pre>";

                              $_SESSION['carts'][0] = $item;

                              echo "<script> alert('Product Added Successfully '); </script>";
                            //   header('location:viewcart.php');
                              


                }

               

            }


                
                
            ?>

        </div>
    </div>



</body>

</html>