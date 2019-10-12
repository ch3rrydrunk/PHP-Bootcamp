<?php
if(($_POST["login"] != "") && ($_POST["passwd"] != "") && ($_POST["submit"] == "OK"))
{
    if (!file_exists("../private"))
    {
        mkdir("../private", 0755);
        file_put_contents("../private/passwd", "");
    }
    if ($_POST["passwd"] !== "")
    {
        $file = file_get_contents("../private/passwd");
        $pswd_a = unserialize($file);
        if (!$pswd_a[(string)$_POST["login"]])
        {
            $hash = hash("sha256", $_POST["passwd"]);
            $pswd_a[(string)$_POST["login"]]= ["login" => (string)$_POST["login"], "passwd" => $hash];
            file_put_contents("../private/passwd", serialize($pswd_a));
            echo "OK\n";
        }
        else
            echo "ERROR\n";
    }
    else    
        echo "ERROR\n";
}
else
    echo "ERROR\n";
?>