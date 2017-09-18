<?php 
	include('rsa.php');
?>

<html>
	<body>
		<h1>Lab 8 Demo 2: PHP RSA test</h1>
		<?php

		$plaintext = 'hello world';
		echo 'Plain text: ' . $plaintext."<br/><br/><br/>";

		$publicKey = get_rsa_publickey('public.key');

		$encrypted = rsa_encryption($plaintext, $publicKey);
		echo $encrypted."<br/><br/><br/>";

		$privateKey = get_rsa_privatekey('private.key');

		$decrypted = rsa_decryption($encrypted, $privateKey);

		echo 'Unencrypted Data: ' . $decrypted;
		?>
	</body>
</html>
