<?php

	//Tillägg för sessioner

	function deleteSession() {

		session_unset();

		if( ini_get("session.use_cookies") ) {

			$sessionCookieData = session_get_cookie_params();

			$path = $sessionCookieData["path"];
			$domain = $sessionCookieData["domain"];
			$secure = $sessionCookieData["secure"];
			$httponly = $sessionCookieData["httponly"];

			$name = session_name();

			setcookie($name, "", time() - 3600, $path, $domain, $secure, $httponly);

		}

		session_destroy();

	}

	//Här kommer koden från F3...

	//Skapa variabler med default-värden
	$disabled = true;
	$bgColor = "#ffffff";
	$fgColor = "#000000";
	$css = "body { color: $fgColor; background-color: $bgColor; }";

	//Användaren har tryckt på submit-knappen btnSend
	if( isset( $_POST["btnSend"] ) ) {

		//Hämta inkommande data från formuläret input type=color
		$bgColor = $_POST["backgroundcolor"];
		$fgColor = $_POST["foregroundcolor"];

		//Skapa två kakor med färgerna
		setcookie("fgColor", $fgColor, time() + 3600);
		setcookie("bgColor", $bgColor, time() + 3600);

		//Sätt om variabelvärdena
		$css = "body { color: $fgColor; background-color: $bgColor; }";
		$disabled = false;

	}

	//Användaren har tryckt på submit-knappen btnReset OCH kakorna kommer till servern
	if( isset( $_POST["btnReset"] && isset( $_COOKIE["bgColor"]) && isset( $_COOKIE["fgColor"] ) ) {

		//Radera kakorna
		setcookie("fgColor", "", time() - 3600);
		setcookie("bgColor", "", time() - 3600);

	}

	//Användaren har inte tryckt på varken btnSend eller btnReset men i requesten till servern kommer 
	//kakorna bgColor och fgColor med.
	if( !isset( $_POST["btnSend"] ) && 
		!isset( $_POST["btnReset"] ) && 
		isset( $_COOKIE["bgColor"] ) && 
		isset( $_COOKIE["fgColor"]) ) {

		//Hämta data från kakorna
		$bgColor = $_COOKIE["bgColor"];
		$fgColor = $_COOKIE["fgColor"];

		//Sätt om variabelvärden
		$css = "body { color: $fgColor; background-color: $bgColor; }";
		$disabled = false;
	}

?>
<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>Ett exempel med kakor</title>
		<style>
			<?php
				//Skriv ut CSS-instruktionerna...
				echo($css);
			?>
		</style>
	</head>
	<body>
		<div>
			
			<form action="<?php echo( $_SERVER["PHP_SELF"] ); ?>" method="post">
		
				<input type="color" name="backgroundcolor" value="<?php if( isset( $bgColor )) { echo( $bgColor ); } ?>" > <!-- Skriv ut färgvärdet -->
				<input type="color" name="foregroundcolor" value="<?php if( isset( $fgColor )) { echo( $fgColor ); } ?>" > <!-- Skriv ut färgvärdet -->

				<input type="submit" name="btnSend" value="Send" >
				<input type="submit" name="btnReset" value="Reset" <?php if($disabled) { echo("disabled"); } ?> > <!-- Skriv ut disabled om true -->
			
			</form>
		
			<?php
			
				//Utskrifter
				echo("<p>\$_POST</p>") . PHP_EOL;
				echo( "<pre>" );
				print_r( $_POST );
				echo( "</pre>" );

				echo("<p> \$_COOKIE</p>") . PHP_EOL;
				echo( "<pre>" );
				print_r( $_COOKIE );
				echo( "</pre>" );
				
				
			?>
			
		</div>
	</body>
</html>