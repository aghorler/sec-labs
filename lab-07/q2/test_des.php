<?php
	include('des.php');
?>

<html>
	<body>
		<h1>Lab 7 Demo 2: PHP DES test</h1>
		
		<?php
			$key = "secret";

			$message = "this is the message";

			echo "key: " . $key . "<br/>";
			echo "message: " . $message . "<br/>";

			$ciphertext = php_des_encryption($key, $message);

			echo "DES encrypted message: " . $ciphertext;
			echo "<br/>";

			$recovered_message = php_des_decryption($key, $ciphertext);
			echo "DES decrypted message: " . $recovered_message;
		?>
	</body>
</html>
