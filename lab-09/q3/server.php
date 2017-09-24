<html>
	<body>
		<h1>Lab 8 Demo 2: PHP RSA test</h1>
		<?php
			include('rsa.php');

			$publicKey = get_rsa_publickey('public.key');
			$privateKey = get_rsa_privatekey('private.key');

			$ciphertext = $_POST['message'];
			echo "<p>Cipher text: " . $ciphertext . "</p>";

			$decrypted = rsa_decryption($ciphertext, $privateKey);
			echo "<p>Unencrypted Data: " . $decrypted . "</p>";

			$file = fopen("database.txt", "a");
			fwrite($file, $decrypted ."\n");
			fclose($file);
		?>
	</body>
</html>
