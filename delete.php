<?php
include 'connect.php';
//Use the GET method to access parameters from the URL
if(isset($_GET['deletename'])){
    //I'm accessing my deletename from the URL and I'm storing it in the name variable
    $name=$_GET['deletename'];
   //The query is looking for the name we defined
    $sql='delete from fruits where name="'.$name.'"';
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:index.php');
    }else{
        die(mysqli_error($con));
    } 
}



?>