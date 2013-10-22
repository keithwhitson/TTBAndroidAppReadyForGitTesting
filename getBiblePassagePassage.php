<?php
if(isset( $_GET['passage_id'])){
$passage_id = $_GET['passage_id'];
}
if(isset( $_POST['passage_id'])){
$passage_id = $_POST['passage_id'];
}
require 'connect.php';
$sql = "SELECT passage FROM `completedatabase` WHERE passage_id='$passage_id'";
mysqli_set_charset($con,"utf8");
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
echo $row[0];
}
?>