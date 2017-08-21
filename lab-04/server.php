<?php
	//open a file named "database.txt"
	$file = fopen("database.txt","a");

	//write into the users.txt file
	fwrite($file, $_POST['entered'] . "\n");

	//close the "$file"
	fclose($file);
?>
