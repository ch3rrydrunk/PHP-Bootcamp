<?php
	session_start();
	if ($_SESSION['loggued_on_user'])
	{
			header("Location:profile.html");
		return;
	}
	echo "ERROR\n";
?>