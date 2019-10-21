<?php
	session_start();
	$data = unserialize(file_get_contents("../private/passwd"));
	foreach($data as $key => $val)
	{
		if ($val['login'] == $_SESSION['loggued_on_user'])
		{
			echo json_encode($val);
			break;
		}
	}
?>