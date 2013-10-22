<?php
// Create connection
$con=mysqli_connect("localhost","root","","ttb_android_app");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<script type="text/javascript">console.log("You are connected to the database");</script>