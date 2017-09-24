<!DOCTYPE html>
<html>
	<body>
		<?php
			include('rsa.php');

			$username = $_POST['username'];
			$password = $_POST['password'];

			$privateKey = get_rsa_privatekey('private.key');
			$decrypted = rsa_decryption($password, $privateKey);

			$value = explode("&", $decrypted);
			
			if((time() - $value[1]) < 150){
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
		?>
	</body>
</html>
