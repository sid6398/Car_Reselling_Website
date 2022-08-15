<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

<div class="content">
      <h3>Hello, <span>seller</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>Please enter you Car Details</p>
<div class="form-container">

   <form action="car_details.php" method="post">
      <input type="text" name="car_name" required placeholder="enter your Car name">
      <input type="text" name="car_type" required placeholder="enter your Car type">
      <input type="number" name="car_price" required placeholder="enter your car price">
      <input type="number" name="car_speed" required placeholder="enter your car top speed">
      <input type="submit" name="submit" value="Add now" class="form-btn">
   </form>

</div>
      
      <!-- <a href="login_form.php" class="btn">login</a>
      <a href="register_form.php" class="btn">register</a> -->
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>