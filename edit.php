<?php
//connect to the database
include 'connect.php';
//Access and pass editname into my name variable
$name = $_GET['editname'];
//Display the name in the form
$sql = "Select * from `fruits` where name='$name'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$sql = 'delete from fruits where name="' . $name . '"';
$result = mysqli_query($con, $sql);

//Post method inside the form, if it is set to submit then only I store the data
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    //Update name into table
    $sql = "insert into `fruits` (name) 
values('$name')";
    //to execute this query I create one variable "result" inside which I pass "mysqli_query" method with 2 parameters, the connection and the query
    $result = mysqli_query($con, $sql);
    //if it is successful then redirect to the index page, if not, error message
    if ($result) {
        header('location:index.php');
    } else {
        die(mysqli_error($con));
    }
}


?>



<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Fruit List</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Fruit" name="name" value=<?php echo $name; ?>>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2" name="submit">Edit</button>
                </div>
            </div>
        </form>

    </div>


</body>

</html>