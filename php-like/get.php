<?php
require "assets/db/db.php";
if (isset($_POST['id'])) {
    // echo $_POST['id'];
    $product = $_POST['id'];
    $id = $product['product_id'];
    $status = $product['status'];

    $sql = "UPDATE likes SET likes = '$status' WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result) {
        echo 'updated';
    } else {
        echo "failed";
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/53a10f910c.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">

        <div class='bg-light text-center p-3 text-danger'>
            <h1>Favorite List</h1>
        </div>
        <hr>

        <div class='ms-auto'>
           <div  >
           <a href="index.php" class='btn btn-primary px-4'>Home</a>
           </div>
        </div>



        <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">

        <?php

        $sql = "SELECT * from likes WHERE `likes` = 1 ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            //  echo "not empty";
            while ($row = $result->fetch_assoc()) {
                



        ?>

                
                    <div class="col">
                        <div class="card">
                            <img src="assets/image/<?php ECHO $row['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo  $row['pname'] ?></h5>
                                <p class='card-text fs-4 text-danger fw-bold'><span><small><s>500</s></small></span> RS : 299</p>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>

            <?php

            }
        } else {
        }

            ?>
                </div>


    </div>

</body>

</html>