<html>
	<body>
		<?php
			$user_input = $_POST['input'];

			$file = fopen("database.txt","a");
			fwrite($file, $user_input."\n");
			fclose($file);
			
			echo "The hash value has been added to the database.txt";
		?>
	</body>
</html>
