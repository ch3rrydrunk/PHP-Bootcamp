<?php
include "auth.php";
session_start();
if($_GET["login"] && $_GET["passwd"])
{
    if (auth($_GET["login"], $_GET["passwd"]))
        $_SESSION["loggued_on_user"] = $_GET["login"];
    else
        $_SESSION["loggued_on_user"] = "";
    if ($_SESSION["loggued_on_user"] == $_GET["login"])
        echo "OK\n";
    else
        echo "ERROR\n";
}
?>