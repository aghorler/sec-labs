<!DOCTYPE html>
<html>
	<body>
	<?php
		include('rsa.php');

		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$exist = 0;

		foreach(file('database.txt') as $line){
			list($userFromFile, $passwordFromFile) = explode(",", $line);

			if($userFromFile == $username){
				$exist = 1;
				break;
			}
		}
		
		if($exist == 1){
			echo "<p>This user exists!</p> <p>Please enter another one via <a href='register.html'>register.html</a></p>";
		}
		else{
			$privateKey = get_rsa_privatekey('private.key');

			$decrypted = rsa_decryption($password, $privateKey);

			$value = explode("&", $decrypted);
			
			if((time() - $value[1]) < 150){
				$credential = $username . "," . $value[0];

				$file = fopen("database.txt", "a");
			
				fwrite($file, $credential . "\n");
			
				fclose($file);

				echo "<p>Account added to the database.txt.</p>";

				header("refresh:1;url=login.html");
			}
		}
	?>
	</body>
</html>
