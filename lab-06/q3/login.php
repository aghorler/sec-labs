<!DOCTYPE html>
<html>
	<body>
	<?php
		$username = $_POST['username'];
		$password = $_POST['password'];

		$exist = 0;

		foreach(file('users.txt') as $line) {
			list($userFromFile, $passwordFromFile) = explode(",",$line);

			if($username == $userFromFile && $password == substr($passwordFromFile, 0, -1)){
				$exist = 1;
				break;
			}
		}
		
		if($exist == 1){
			echo "You are logged in!";
		}
		else{
			echo "An account by that username and password does not exist. <br/><br/>Please try to register via <a href='register.html'>register.html</a>";
		}
	?>
	</body>
</html>
