<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>	
	<?php
		define("PI",3.14);
	    $r = 10;
	    class Desk{
	    	const RED = "1103";

	    	public $colorCode;
	    }

	    class Chair{
	    	const RED = "7103";
	    	public $colorCode;
	    }

	    $a = new Desk();
	    $b = new Chair();

	    $a -> colorCode = Desk::RED;
	    $b -> colorCode = Chair::RED;
	?>
</body>
</html>