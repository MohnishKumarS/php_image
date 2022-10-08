<?php
include '../assets/db/db.php';
session_start();

// extract($_REQUEST);
    if(isset($_POST['submit'])){

        $fname = $_FILES['image']['name'];
        $text = $_REQUEST['text'];
        // echo $text;
            // $newname = strtolower(end(explode('.',$fname)));
            // echo $newname;
        // echo '<script> alert("hi");</script>';
      
        // echo $fname;
        // $sample = "assets/image/". basename( $_FILES['image']['name']);
            // echo $sample;
        // $rem = explode(".",$fname);
        // print_r ($rem);


        $dir = "../assets/image";
        $profilepic = $dir . "/" . $fname;
        move_uploaded_file($_FILES['image']['tmp_name'],$profilepic);


        $sql = "INSERT  into upload (username,password,image,text) values('".$_SESSION['name']."','".$_SESSION['pass']."','$profilepic','$text')";
        $conn->query($sql);
   

    }

//    echo $_SERVER['PHP_SELF'];
//    echo '<br>';
//    echo $_SERVER['HTTP_HOST'];
//    echo '<br>';
//    echo $_SERVER['SERVER_NAME'];
//    echo '<br>';
//    echo $_SERVER['REQUEST_URI'];
//    echo '<br>';
//  ========================cookie========================== 

// if(isset($_POST['login'])){
//     echo "cokiedwed";
// }

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
</head>

<body>


    <div class="container">

    <div class='text-end '>
        <a href="index.php" class='btn btn-info fw-bold mt-4'>Back to  Home</a>
    </div>
        <div class="mt-5 border bg-light p-5 text-center">

            <h1 class="fw-bold ">
                File Upload Here
            </h1>

            <form action="" method="post" enctype="multipart/form-data" class="mt-4">
                <label for="" class='fs-5 fw-bold text-dark'> Select image to upload:</label>
                <input type="file" name="image" id="fileToUpload"><br>
                <textarea name="text" id="" cols="50" rows="5" class="mt-5"></textarea><br>
                <input type="submit" value="Upload" class="btn btn-success w-25 mt-4" name="submit">


            </form>
        </div>

        <div>
            <?php

                            
            if(isset($_GET['delete'])){
                // echo '<script> alert("hi");</script>';
                $id = $_REQUEST['id'];
                // echo $id;
                $sql = "DELETE from upload where id = $id";
                $conn->query($sql);
            }
            //  
            $sql = "SELECT * from upload order by id desc ";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<div>
                    <div class='row h-50 w-50'>
                        <div class='col-lg-6'>
                        <img src='$row[image]' class='w-100 h-50' alt=''>
                        </div>
                        <div class='col-lg-6'>
                        <form action='' method='get' class='text-center mt-5'>
                        <input type='hidden' value='$row[id]' name='id'>
                        <button type='submit' class='btn btn-danger' name='delete'>Delete</button>
                    </form>
                        </div>
                    </div>
                </div>";
            
                    // echo' <br>';
                }
            }else{
                echo "there is No images!";
            }

             
           
            ?>




        </div>
    </div>



</body>

</html>