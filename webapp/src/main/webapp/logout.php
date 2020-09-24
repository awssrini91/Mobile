<?php
	session_start();
	session_destroy();	
	unset($_SESSION["username"]);
	session_start();
	$_SESSION["message"] = "Logout Successfully!!!";
	redirect("index.php");
?>

<?php
	function redirect($file)
	{
		$host=$_SERVER["HTTP_HOST"];
		$path=rtrim(dirname($_SERVER["PHP_SELF"]),"/\\");
		header("Location:http://$host$path/$file");
	}
?>