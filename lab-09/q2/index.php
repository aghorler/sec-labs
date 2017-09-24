<?php 
	include('rsa.php');
?>

<html>
	<body>

	<h1>Lab 9 Demo 2:</h1>

	<?php
		// set the message
		$message = 'hello world';
		echo 'Plain text: ' . $message."<br/><br/>";

		// compute the hash value of the message
		$hash = hash("sha256", $message);
		echo 'Hashed value: ' . $hash."<br/><br/>";

		//get current timestamp in second sice Jan 01 1970. (UTC)
		$timestamp = time();
		echo "Timestamp: ".$timestamp."<br/><br/>";


		// Get the public Key
		$publicKey = get_rsa_publickey('public.key');
		// compute the ciphertext
		$encrypted = rsa_encryption($hash."&".$timestamp, $publicKey);
		echo "encrypted 'hash value + & + timestamp': ".$encrypted."<br/><br/>";

		// Get the private Key
		$privateKey = get_rsa_privatekey('private.key');
		// compute the decrypted value
		$decrypted = rsa_decryption($encrypted, $privateKey);
		echo 'decrypted: ' . $decrypted."<br/><br/>";

		// Split decrypted value based on "&"
		echo "<br/>Split the decrypted value based on '&': <br/>";
		$split_value = explode("&", $decrypted);
		echo "split 1 (hashed message): " . $split_value[0]."<br/>";
		echo "split 2 (timestamp): " . $split_value[1]."<br/>";
	?>
	</body>
</html>
