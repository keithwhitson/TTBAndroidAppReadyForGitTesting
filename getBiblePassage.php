<?php
if(isset( $_GET['book'])){
$book = $_GET['book'];
}
if(isset( $_POST['book'])){
$book = $_POST['book'];
}
require 'connect.php';
$sql = "SELECT distinct passage_id, passage FROM `completedatabase` WHERE book='$book'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
echo "<li><a href='#biblebookswithpassagetext' class='biblepassage' passage='$row[0]' id='$row[1]'>$row[1]</a></li>";
}
?>