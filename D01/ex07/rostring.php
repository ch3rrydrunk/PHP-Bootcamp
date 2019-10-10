#!/usr/bin/php
<?php
 if ($argc >= 2)
 {
    $tab = preg_split("/[\s]+/", trim($argv[1]));
    $first = array_shift($tab);
    array_push($tab, $first);
    print(implode(" ", $tab)."\n");
 }
?>