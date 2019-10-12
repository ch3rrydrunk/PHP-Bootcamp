<?php
if(($_POST["login"] != "")  && ($_POST["oldpw"] != "") && ($_POST["newpw"] != "") && $_POST["submit"] == "OK")
{
    if (!file_exists("../private/passwd"))
    {
        mkdir("../private", 0755);
        file_put_contents("../private/passwd", "");
    }
    if ($_POST["newpw"] !== "")
    {
        $file = file_get_contents("../private/passwd");
        $pswd_a = unserialize($file);
        if (hash("sha256", $_POST["oldpw"]) == $pswd_a[(string)$_POST["login"]]["passwd"])
        {
            $hash = hash("sha256", $_POST["newpw"]);
            $pswd_a[(string)$_POST["login"]] = ["login" => (string)$_POST["login"], "passwd" => $hash];
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