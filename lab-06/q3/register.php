<!DOCTYPE html>
<html>
	<body>
	<?php
		$username = $_POST['username'];
		$password = $_POST['password'];

		$credential = $username . "," . $password;
		
		$exist = 0;

		foreach(file('users.txt') as $line){
			list($userFromFile, $passwordFromFile) = explode(",",$line);

			if($userFromFile == $username){
				$exist = 1;
				break;
			}
		}
		
		if($exist == 1){
			echo "The input is exist! <br/><br/>Please enter another one via <a href='register.html'>register.html</a>";
		}
		else{
			$file = fopen("users.txt","a");
			
			fwrite($file,$credential."\n");
			
			fclose($file);
			echo "The input is added to the users.txt. <br/><br/>Please try to enter the same input again via <a href='register.html'>register.html</a>";
		}
	?>
	</body>
</html>
