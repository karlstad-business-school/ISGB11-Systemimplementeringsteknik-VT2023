<?php
	//Starta en ny session eller ge tillträde till en redan befintlig
	session_start();
?>
<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>ex2.php F4</title>
	</head>
	<body>
		<div>
			<?php
			
				//Generera en ny sessionsnyckel och radera den tidigare
				session_regenerate_id( true );
				
				//Skriv ut innehållet i miljövariabeln
				echo( "<pre>" );
				print_r( $_SESSION );
				echo( "</pre>" );
				
				//Skapa och tilldela värden till två sessionsvariabler
				$_SESSION["courseName"] = "Systeminmplementeringsteknik";
				$_SESSION["courseCode"] = "ISGB11";
				
				//Skriv ut innehållet i två sessionsvariabler
				echo( "<p>" . $_SESSION["courseName"] . "</p>" );
				echo( "<p>" . $_SESSION["courseCode"] . "</p>" );
				
				//Skriv ut sessionens id
				echo( "<p>session_id() ger " . session_id() . "</p>" ); 
				//Skriv ut sessionens namn
				echo( "<p>session_name() ger " . session_name() . "</p>" ); 
				
				//Radera alla sessionsvariabler
				session_unset();
				//Avsluta sessionen
				session_destroy(); 
				
			?>
		</div>
	</body>
</html>