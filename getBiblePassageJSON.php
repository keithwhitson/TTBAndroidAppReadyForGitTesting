<?php
header('Content-type: application/json');
if(isset( $_GET['book'])){
$book = $_GET['book'];
}
if(isset( $_POST['book'])){
$book = $_POST['book'];
}
require 'connect.php';
echo $sql = "SELECT distinct passage_id, passage FROM `completedatabase` WHERE book='$book'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
$data[] = $row;
echo json_encode($data);
}
?>