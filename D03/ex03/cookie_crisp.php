<?php
    $twohr = 7200;
    if ($_GET["action"] === 'set') 
        setcookie($_GET["name"], $_GET["value"], time() + $twohr, "/");
    else if ($_GET["action"] === 'get')
        echo $_COOKIE[$_GET["name"]] . PHP_EOL;
    else if ($_GET["action"] === 'del')
        setcookie($_GET["name"], "", time() - $twohr, "/");
?>