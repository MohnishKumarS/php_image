<?php
require("../assets/db/db.php");

if (isset($_POST['id'])) {
    // echo 'succeess';
    $id = $_POST['id'];
    $sql = "SELECT * from jsons where id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data['id'] = $row['id'];
            // echo $data['id'];
            $data['sname'] = $row['sname'];
            $data['gender'] = $row['gender'];
            $data['physics'] = $row['physics'];
            $data['maths'] = $row['maths'];
            $data['english'] = $row['english'];
            // echo  $data['english'];

        }
       

        echo json_encode($data);
    }
}


if (isset($_GET['input'])) {
    // echo "live";
    $get_input = $_GET['input'];
    $sql = "SELECT * from jsons where sname like '{$get_input}%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row['sname']; ?>

         <h4 class='fw-bold text-center text-warning'>Search Result</h4>
  
            <table class='table table-success table-striped fs-4'>
                <tr>
                    <th>Student Id :</th>
                    <td><?= $row['id'] ?></td>
                </tr>
                <tr>
                    <th>Student Name :</th>
                    <td><?= $row['sname'] ?></td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td><?= $row['gender'] ?></td>
                </tr>
                <tr>
                    <th>Physics:</th>
                    <td><?= $row['physics'] ?></td>
                </tr>
                <tr>
                    <th>Maths :</th>
                    <td><?= $row['maths'] ?></td>
                </tr>
                <tr>
                    <th>English :</th>
                    <td><?= $row['english'] ?></td>
                </tr>

            </table>

<?php
        }
    } else {
        echo "<h3 class='text-center mt-4 text-danger'>No data & records</h3>";
    }
}

?>
