<?php
	function auth($login, $passwd)
	{
		$data = unserialize(file_get_contents("../private/passwd"));
		foreach($data as $val)
		{
			if ($val['login'] == $login)
			{
				if ($val['passwd'] == hash("whirlpool", $passwd))
					return true;
				break;
			}
		}
		return false;
	}
?>