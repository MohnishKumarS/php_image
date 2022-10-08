<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/53a10f910c.js" crossorigin="anonymous"></script>
</head>
<style>
    .container{
        background-color:transparent;
        height: 100vh;
        position: relative;
        
    }
    #center{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);

    }
    #center h1{
        font-size: 50px;
    }
   
</style>

<body>

    <section>

        <div class="container">
            <div class="d-flex justify-content-between bg-warning p-4">
                <div>
                    <h2 class=" text-center text-primary fw-bold">Welcome <span class='fw-bold text-danger h1'>
                            <?php
                            if (isset($_SESSION['name'])) {
                                echo $_SESSION['name'];
                            } else {

                                echo " ";
                            }

                            ?>
                        </span></h2>
                </div>
                <div>

                    <!-- <a href="upload.php" class="ms-3 fs-4">Click Here...</a> -->
                    <?php
                    if (isset($_SESSION['name'])) {
                        echo '<a href="logout.php" class="btn btn-danger btn-lg">Logout</a>';
                    } else {
                        echo ' ';
                    }
                    ?>
                </div>
            </div>

            <div id="center">
                <h1>File upload <i class="fa-solid fa-file"></i> </h1>

                <?php


                if (isset($_SESSION['name'])) {
                    echo '<a href="upload.php" class="ms-3 fs-4 ">Click Here...</a>';
                } else {
                    echo '<a href="login.php" class="ms-3 fs-4">Click Here...</a>';
                }


                ?>



            </div>
        </div>
    </section>


</body>

</html>