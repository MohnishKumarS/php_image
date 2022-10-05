<?php

function component($image,$name,$price,$id){
    $elements = "<div class='col'>
    <div class='card'>
    <form method='get' action=''>
        <img src='$image' class='card-img-top' width='100' height='300' alt='...'>
        <div class='card-body text-center'>
            <h5 class='card-title fs-3'>{$name}</h5>
            <p class='card-text fs-4'><s>200</s><b class='ms-3 text-danger'>Rs:$price </b></p>
            <div class='text-center'>
            <label>Quantity : </label>
            <input type='number' name='quantity' placeholder='Enter Quantity'> <br>
                <button class='btn btn-warning  fs-6 mt-4' name='add'>Add to Cart<i class='fa-solid fa-cart-shopping fs-6  bg-warning ms-2'></i></button>
                
                <input type='hidden' value='$id'  name='id'>
            </div>
        </div>
    </form>    
    </div>
</div>";

echo $elements;
}




?>