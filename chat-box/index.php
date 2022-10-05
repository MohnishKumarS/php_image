<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chatbox</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/53a10f910c.js" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Times New Roman', Times, serif;
}
html, body{
    display: grid;
    height: 100%;
    place-items: center;
    background-color: rgb(221, 163, 76);

}

.chatbox{
    width:400px;
    background-color: white;
    border-radius: 5px;
}
.chatbox .title{
    text-align: center;
    text-decoration: underline rgb(192, 27, 27);
    color: rgb(6, 1, 1);
    background-color:rgb(120, 227, 120);
    line-height: 60px;
    border-radius: 5px 5px 0px 0px;

}
.chatbox .form{
    padding: 12px 12px;
    min-height: 500px;
    max-height: 500px;
    overflow-y:auto;
    /* word-break: break-all; */
}
.chatbox .form .inbox{
    width:100%;
    display: flex;
}

.chatbox .form .user-inbox{
    display: flex;
    justify-content: flex-end;
    margin-right: 10px;
}
.chatbox .form .inbox .icon{
    height: 40px;
    width:40px;
    text-align:center;
    line-height: 40px;
    font-size: 20px;
    
    border-radius: 50%;
    background-color: rgb(120, 227, 120);


}

.chatbox .form .inbox .msg {
    max-width: 58%;
    margin-left: 13px;
   

}

.chatbox .form .user-inbox .msg{
    max-width:60%;
    /* justify-content: flex-end; */
}
.chatbox .form .user-inbox .msg p{
    font-size: 17px;
    font-weight: 600;
    line-height: 25px;
    border-radius: 20px;
    background-color:rgb(207, 210, 213);
    padding: 3px 7px;
}

.chatbox .form .inbox .msg p{
    font-size: 17px;
    font-weight: 600;
    line-height: 25px;
    border-radius: 20px;
    background-color:rgb(120, 227, 120);
    padding: 3px 7px;
}
.chatbox .type-data{
    display:flex;
    width: 100%;
    height: 70px;
    align-items: center;
    justify-content: space-evenly;
    background-color: rgb(207, 210, 213);
    border-radius: 0px 0px 5px 5px;
}

.chatbox .input-data{
    height: 40px;
    width:350px;
    position: relative;
    
}

.chatbox .input-data input{
    width: 100%;
    height: 40px;
    outline: none;
    border:1px solid transparent;
    font-size: 18px;
    border-radius: 5px;
    
}

.chatbox .input-data input:focus{
    border:2px solid  rgb(120, 227, 120);
}
.chatbox .input-data input:focus::placeholder{
    color:rgb(142, 189, 231);
}
.chatbox .type-data .input-data button{
    position: absolute;
    top:50%;
    right: 10px;
    width: 75px;
    height: 30px;
    font-size: 16px;
    font-weight: 600;
    border:1px solid rgb(120, 227, 120);
    border-radius: 5px;
    cursor: pointer;
    opacity: 0;
    pointer-events: none;
    background-color: rgb(120, 227, 120);
    transform : translateY(-50%);
    transition: 0.3s ease;

}
.chatbox .type-data .input-data input:valid ~ button{
    opacity: 1;
    pointer-events: auto;
    
}







    </style>
</head>

<body>
    <div class="chatbox border border-light ">
        <h1 class="title fw-bold">Simple Chatbox</h1>
        <div class="form">
            <div class="inbox">
                <div class="icon ">
                    <i class="fa-solid fa-user "></i>
                </div>
                <div class="msg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisic</p>
                </div>
            </div>
            <div class="user-inbox">
                <div class="msg">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit lorem20</p>
                </div>
            </div>
        </div>
        <div class="type-data">
            <div class="input-data">
                <input type=" text" id='input' placeholder="type here something">
                <button id="send">Send</button>
            </div>
        </div>

    </div>


    <script>
        $(function() {
            $("#send").on("click", function() {
                // alert("hi");
                $value = $("#input").val();
                //  console.log($msg);  
                $msg = '<div class="user-inbox"><div class="msg"><p>' + $value + '</p></div></div>';
                $(".form").append($msg);
                $("#input").val('');
                // window.location = "message.php"

                $.ajax({
                    url: "message.php",
                    type: "post",
                    data: {"text":$value},
                    success: function(reply) {
                        console.log(reply);
                        $reply =
                            '<div class="inbox"><div class="icon "><i class="fa-solid fa-user "></i></div><div class="msg"><p>' +
                            reply + '</p></div></div>'
                        $(".form").append($reply);
                        //  $text = $('.form').prop('scrollHeight');
                        $text = $('.form')[0].scrollHeight;
                        console.log($text);
                        $('.form').scrollTop($text);
                    }

                });



            })
        })
    </script>


</body>

</html>