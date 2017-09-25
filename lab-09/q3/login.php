<!DOCTYPE html>
<html>
	<body>
		<?php
			include('rsa.php');

			$username = $_POST['username'];
			$password = $_POST['password'];

			echo "<p><strong>POSTed password: </strong>" . $password . "</p>";

			$privateKey = get_rsa_privatekey('private.key');
			$decrypted = rsa_decryption($password, $privateKey);

			echo "<p><strong>POSTed password (decrypted): </strong>" . $decrypted . "</p>";

			$value = explode("&", $decrypted);

			echo "<p><strong>Current timestamp: </strong>" . time() . "</p>";
			echo "<p><strong>POSTed timestamp: </strong>" . $value[1] . "</p>";
			
			if((time() - $value[1]) < 150){
				echo "<p><strong>Timestamp difference is less than 150!</strong></p>";

				$exist = 0;

				foreach(file('database.txt') as $line){
					$result = explode(",", $line);

					if($result[0] == $username && rtrim($result[1]) == $value[0]){
						$exist = 1;
						break;
					}
				}

				if($exist == 1){
					echo "<p>You are logged in!</p>";
				}
				else{
					echo "<p>Account not found!</p>";
				}
			}
			else{
				echo "<p><strong>Timestamp difference is less than 150!</strong></p>";
				echo "<p>You are not logged in!</p>";
			}
		?>
	</body>
</html>
