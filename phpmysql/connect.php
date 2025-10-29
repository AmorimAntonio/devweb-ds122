<?php
    $conn = mysqli_connect("localhost","root","adin");
    if (!$conn){
        die(mysqli_connect_error());
    }
    else{
        echo "Ola mundo";
    }

    //...
    mysqli_close($conn);
?>