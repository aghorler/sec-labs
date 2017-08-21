<!DOCTYPE html>
<html>
	<body>
	<?php
		$input = $_POST['enter'];
		
		$exist = 0;

		foreach(file('database.txt') as $line){
			if($line == $input."\n"){
				$exist = 1;
				break;
			}
		}
		
		if($exist == 1){
			echo "The input is exist! <br/><br/>Please enter another one via <a href='client.html'>client.html</a>";
		}
		else{
			$file = fopen("database.txt","a");

			fwrite($file,$input."\n");

			fclose($file);
			echo "The input is added to the database.txt. <br/><br/>Please try to enter the same input again via <a href='client.html'>client.html</a>";
		}
	?>
	</body>
</html>
