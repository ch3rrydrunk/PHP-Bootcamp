#!/usr/bin/php
<?php
    if ($argc >= 2)
    {
        $tab = preg_split("/[\s]+/", trim($argv[1]));
        echo implode(" ", $tab)."\n";
    }
?>