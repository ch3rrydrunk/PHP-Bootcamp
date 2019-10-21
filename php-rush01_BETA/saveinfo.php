<?php
	session_start();
	$data = unserialize(file_get_contents("../private/passwd"));
	foreach($data as $key => $val)
	{
		if ($val['login'] == $_SESSION['loggued_on_user'])
		{
			$val['aboutme'] = $_POST['aboutme'];
			$data[$key] = $val;
			file_put_contents("../private/passwd", serialize($data));
			break;
		}
	}
?>