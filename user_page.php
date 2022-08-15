<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<?php
 
$user = 'root';
$password = '';
 
$database = 'used_cars';
 
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
$sql = " SELECT * FROM cars ORDER BY car_speed DESC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
   <title>user page</title>
   <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: yellow;
            border: 1px solid black;
        }

        th{
            background:orange;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: bold;
            color:green;
        }
    </style>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Hello, <span>buyer</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>List of cars available to buy</p>
      <!-- <table>
            <tr>
                <th>Car Name</th>
                <th>Car Type</th>
                <th>Car Price</th>
                <th>Car Speed</th>
            </tr> -->
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?>
            <!-- <tr>
                <td><?php echo $rows['car_name'];?></td>
                <td><?php echo $rows['car_type'];?></td>
                <td><?php echo $rows['car_price'];?></td>
                <td><?php echo $rows['car_speed'];?></td>
            </tr> -->
            <div class="card" style="width: 30rem;">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
             <h2 class="card-title">Name of Car:-<?php echo $rows['car_name'];?></h2>
             <p class="card-text">Car Type:-<?php echo $rows['car_type'];?></p>
             <p class="card-text">Price:-<?php echo $rows['car_price'];?></p>
             <p class="card-text">Speed(kmph):-<?php echo $rows['car_speed'];?></p>
         
                </div>
</div>
            <?php
                }
            ?>
        <!-- </table> -->
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>