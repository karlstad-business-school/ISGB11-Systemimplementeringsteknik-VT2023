<?php
	session_start();
?>
<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>ex1.php F4 </title>
	</head>
	<body>
		<div>
			<?php
			
				echo( $_SERVER["PHP_SELF"] );
				
				echo( "<pre>" );
				print_r( $_SESSION );
				echo( "</pre>" );
				
				$_SESSION["courseName"] = "Systemimplementeringsteknik";
				$_SESSION["courseCode"] = "ISGB11";
				
				echo( "<pre>" );
				print_r( $_SESSION );
				echo( "</pre>" );
				
			?>
			
		</div>
	</body>
</html>