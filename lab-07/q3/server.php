<!DOCTYPE html>
<html>
	<body>
	<?php
		include('des.php');

		$ciphertext = $_POST['message'];
		$key = "secret";
		$decrypted = php_des_decryption($key, $ciphertext);

		echo "<p><strong>POSTed encrypted message:</strong> " . $ciphertext . "</p>";
		echo "<p><strong>Pre-set key:</strong> " . $key . "</p>";
		echo "<p><strong>DES decrypted message:</strong> " . $decrypted . "</p>";

		$file = fopen("database.txt", "a");

		fwrite($file, $decrypted ."\n");

		fclose($file);
	?>
	</body>
</html>
