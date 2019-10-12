<?php
    function auth($login, $passwd)
    {
        if (file_exists("../private/passwd"))
        {
            $file = file_get_contents("../private/passwd");
            $pswd_a = unserialize($file);
            if ($pswd_a[$login] && hash("sha256", $passwd) == $pswd_a[$login]["passwd"])
                return (TRUE);
            else
                return (FALSE);
        }
        else
            return (FALSE);
    }
?>