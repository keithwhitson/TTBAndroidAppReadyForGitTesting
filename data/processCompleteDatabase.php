<?php
header('Content-Type: text/html; charset=utf-8');
set_time_limit(120);
require 'connect.php';
$file = "http://localhost/ttbAndroidApp/data/completedatabase.csv";
$handle = fopen($file,"r");

/*

$testfileinput = fgetcsv($handle);
$testfileinput = fgetcsv($handle);

echo $passage_id = $testfileinput[0];
echo $biblebook_id = $testfileinput[1];
echo $passage = mysql_real_escape_string($testfileinput[2]);

echo $sql = "INSERT INTO ttb_android_app.passages (passage_id, biblebook_id,  passage) VALUES ($passage_id,$biblebook_id,'$passage')";

$result = mysqli_query($con,$sql);	*/

$fileinput = fgetcsv($handle,0,",");
while(($fileinput = fgetcsv($handle,0,",")) !== false)
{
	$book = $fileinput[0];
	$passagetext = ($fileinput[1]);
	$passage = ($fileinput[2]);
	$mp3 = ($fileinput[3]);
	$sql = "INSERT INTO ttb_android_app.completedatabase (book,  passagetext, passage,mp3) VALUES ('$book','$passagetext','$passage','$mp3')";
	$result = mysqli_query($con,$sql);	
}

?>