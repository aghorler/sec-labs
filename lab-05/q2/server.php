<!DOCTYPE html>
<html>
	<body>
	<?php
		$string = "one,two";

		list($a, $b) = explode(",",$string);

		echo $a;
		echo "<br/>";
		echo $b;
	?>
	</body>
</html>
