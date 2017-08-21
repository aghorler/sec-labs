<!DOCTYPE html>
<html>
<body>

We assume there is a table in the database, named text.txt
<br/><br/>

<?php
	//open a file named "text.txt"
	$file = fopen("test.txt","a"); //"w"=overwrite
	$anything = "hello world!";
	//write into the users.txt file
	fwrite($file,$anything);
	//close the "$file"
	fclose($file);
?>

Done! Check the test.txt file.

</body>
</html>
