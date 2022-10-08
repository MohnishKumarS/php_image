<?php
require("../assets/db/db.php");

$json = "student.json";

$data = file_get_contents($json);
// echo "<pre>";
// print_r($data) ;

$array = json_decode($data, true);

// echo "<pre>";
// print_r($array) ;


foreach ($array['students'] as $row) {
    // echo "<pre>";
    // print_r($row[' name']);
    // print_r($value);

    $sql = "INSERT into jsons (sname,gender,physics,maths,english) Values ('" . $row[' name'] . "','" . $row['gender'] . "','" . $row['physics'] . "','" . $row['maths'] . "','" . $row['english'] . "')";
    // $result = $conn->query($sql);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Json</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/53a10f910c.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <div class="container">
        <div>
            <h2 class='border border-3 border-warning p-3 text-center bg-light rounded-3 '>Json and XML Data Fetch</h2>
        </div>

        <div>
            <h3 class=''>Search Data</h3>
        </div>

        <div class="row">

            <div class="col">
                <form method="get" class='mt-5' >
                    <div>
                        <input type="text" name='search' value="" class='form-control' id='live-search' placeholder="Type here" >
                    </div>

                </form>

                <div id='live-details'>

                </div>

            </div>

            <!-- =====================search 2============================== -->

            <div class="col">
                <div class='row row-cols-1 row-cols-md-2 mt-5'>
                    <div class="col">
                        <select class="form-select" id='student_list'>
                            <option selected class='text-center fs-5'>Open this student details.. </option>



                            <?php
                            $sql = "SELECT * from jsons order by sname ASC";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                // echo $row["sname"];
                                echo '<option value="' . $row['id'] . '" class="text-center fs-5">' . $row["sname"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col">
                        <button type="submit" class='btn btn-success' name='search' id='search'>Search</button>
                    </div>

                </div>

                <!-- ---------------------details------------- -->

                <div class=" mt-4">
                    <table class="table table-striped table-hover " id='stu-details' style="display:none;">
                        <tr class='fs-3'>
                            <th>Student Id :</th>
                            <td id='student_id' colspan="2"></td>
                        </tr>
                        <tr class='fs-3 ' style="width:100%">
                            <th>Name :</th>
                            <td id='student_name' colspan="2"></td>
                        </tr>
                        <tr class='fs-3 '>
                            <th>Gender :</th>
                            <td id='student_gender' colspan="2"></td>
                        </tr>
                        <tr class='fs-3 '>
                            <th colspan="3" class='text-center text-primary'>Marks</th>
                        </tr>
                        <tr class='fs-3 text-center '>
                            <th>Physics </th>
                            <th>Maths </th>
                            <th>English </th>

                        </tr>
                        <tr class='fs-3 text-center'>
                            <td id='physics'></td>
                            <td id='maths'></td>
                            <td id='english'></td>

                        </tr>

                    </table>
                </div>
            </div>
        </div>


    </div>


</body>

</html>



<script>
    $(function() {
        // ==================live search===================================
        $('#live-search').keyup(function(){
            // alert('hii');
            var input = $('#live-search').val();
            // alert(input);

            if(input != ''){
                // alert('fill');
                $.ajax({
                    url:"fetch.php",
                    type:"get",   
                    data:{
                        input:input
                    },
                    success:function(datas){
                        console.log(datas);
                        $('#live-details').html(datas);
                        $('#live-details').css('display','block');
                    }
                })
            }else{
                // alert('No values');
                $('#live-details').css('display','none');
            }

        })











        // -----------------search-----------------------------------

        $('#search').click(function() {
            // alert('hi');
            let ids = $('#student_list').val();
            console.log(ids);
            if (isNaN(ids)) {
                alert("please select name");
            } else {
                $.ajax({
                    url: "fetch.php",
                    type: "post",
                    data: {
                        id: ids
                    },
                    dataType: "json",
                    success: function(data) {
                        // console.log(data.sname);
                        // console.log(JSON.parse(data));
                        console.log(data);

                        $('#stu-details').css('display', 'block');
                        $('#student_id').text(data.id);
                        $('#student_name').text(data.sname);
                        $('#student_gender').text(data.gender);
                        $('#physics').text(data.physics);
                        $('#maths').text(data.maths);
                        $('#english').text(data.english);




                    }


                })
            }


        })
    })
</script>