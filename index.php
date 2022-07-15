<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta  http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title> Fruit List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <button class="btn btn-primary my-5"><a href="fruit.php" class="text-light">Add fruit</a></button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    <!--I want to display my table data here-->
    <?php 
    //I want to display all the data, I write an sql query
    $sql="select * from `fruits`";
    //I create a variable to store the data and pass it in the method mysqli_fetch_assoc
    //Then I create a while loop to display the name I concatenated
    //For the delete button I use as a primary key the name because we don't have anything else
    $result=mysqli_query($con,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $name=$row['name'];
            echo' <tr>
            <td>'.$name.'</td>
            <td>
            <button class="btn btn-primary"><a href="edit.php?editname='.$name.'" class="text-light">Edit</a></button> 
            <button class="btn btn-danger"><a href="delete.php?deletename='.$name.'" class="text-light">Delete</a></button>
            </td>

          </tr>';
        }
    }
    
    ?>
   
  </tbody>
</table>

</div>


</body>
</html>