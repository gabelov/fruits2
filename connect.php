<?php

$con=new mysqli('localhost','root','gabe','list');

//If not connected show me this error below:
if(!$con){
    die(mysqli_error($con));
} 

?>