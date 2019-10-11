#!/usr/bin/php
<?php
    if ($argc >= 2)
    {
        $tab = preg_split("/[\h]+/", trim($argv[1]," \t"));
        echo implode(" ", $tab)."\n";
    }
?>
