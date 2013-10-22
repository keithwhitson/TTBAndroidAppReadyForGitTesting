<?php

require 'connect.php';

$file = "http://localhost/ttbAndroidApp/passagetexts.csv";
$handle = fopen($file,"r");
 /*
($testfileinput = fgetcsv($handle));
($testfileinput = fgetcsv($handle));

echo $passage_id = $testfileinput[0];
echo $biblebook_id = $testfileinput[1];
echo $passage = mysql_real_escape_string($testfileinput[2]);
echo $passagetext = mysql_real_escape_string($testfileinput[3]);

echo $sql = "INSERT INTO ttb_android_app.passatetexts (passage_id, biblebook_id,  passage ,passagetext) VALUES ($passage_id,$biblebook_id,'$passage','$passagetext')";
*/

$fileinput = fgetcsv($handle,0,",");
while(($fileinput = fgetcsv($handle,0,",")) !== false)
{
	
	$passage_id = $fileinput[0];
	$biblebook_id = $fileinput[1];
	$passage = mysql_real_escape_string($fileinput[2]);
	$passagetext= mysql_real_escape_string($fileinput[3]);
	echo $sql = "INSERT INTO ttb_android_app.passatetexts (passage_id, biblebook_id,  passage ,passagetext) VALUES ($passage_id,$biblebook_id,'$passage','$passagetext')";
	$result = mysqli_query($con,$sql);	
}

?>