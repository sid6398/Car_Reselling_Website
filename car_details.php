<?php

$con = mysqli_connect('localhost', 'root', '','used_cars');

$car_name = $_POST['car_name'];
$car_type = $_POST['car_type'];
$car_price = $_POST['car_price'];
$car_speed = $_POST['car_speed'];

// database insert SQL code
$sql = "INSERT INTO `cars` (`car_name`, `car_type`, `car_price`, `car_speed`) VALUES ('$car_name', '$car_type', '$car_price', '$car_speed')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "New Car Inserted";
}

?>