<?php
require "assets/db/db.php";

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<!-- 
    <style>
        #loader {
            position: fixed;
            background: rosybrown;
            width: 100%;
            height: 118vh;
            z-index: 99;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 40px;
        }
    </style> -->

</head>

<body>

    <!-- <div id="loader">loading..</div> -->

    <div class="container">
        <div class="d-flex justify-content-between bg-light p-4 text-center">
            <div>
            <h1 class="  fw-bold text-warning">Favorite Product</h1>
            </div>
            
            <div>
                <a class='btn btn-primary' type='submit' href='get.php'>Favorite</a>
            </div>
        </div>

        <div>
            <div class="row row-cols-1 row-cols-md-4 g-4 mt-5">

                <?php

                $sql = "SELECT * from likes Where id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <div class="col">
                            <div class="card">
                                <img src="assets/image/<?php echo $row['image'] ?>" class="card-img-top" width="50" height="300" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['pname'] ?></h5>
                                    <p class="like">
                                        <?php if ($row['likes']) { ?>
                                            <span class="fa-solid fa-heart" product-id='<?php echo $row['id'] ?>'></span>
                                        <?php } else { ?>
                                            <span class="fa-regular fa-heart" product-id='<?php echo $row['id'] ?>'></span>
                                        <?php } ?>
                                    <p>
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                                        content. This content is a little bit longer.</p>
                                </div>
                            </div>
                        </div>
                <?php }
                } else {
                    echo "<h1 class='bg-danger p-3 text-center text-white'>No Products</h1>";
                }

                ?>


            </div>
        </div>


        <script type="text/javascript">
            $(document).ready(function() {

                $('.like > span').click(function() {
                    let product_id = $(this).attr('product-id');

                    if ($(this).hasClass('fa-regular')) {
                        $(this).removeClass('fa-regular');
                        $(this).addClass('fa-solid');
                        $(this).attr('status', '1');
                    } else {
                        $(this).addClass('fa-regular');
                        $(this).removeClass('fa-solid');
                        $(this).attr('status', '0');
                    }

                    $.ajax({
                        url: "get.php",
                        type: "POST",
                        data: {
                            id: {
                                'product_id': product_id,
                                'status': $(this).attr('status')
                            }
                        },
                        success: function(data) {
                            console.log(data)
                        }
                    });
                })

            });

        </script>

        <?php


        ?>

</body>

</html>