#!/usr/bin/php
<?php
    if ($argc >= 2)
    {
        $args = array_splice($argv, 1, count($argv));
        foreach ($args as $arg)
        echo $arg."\n";
    }
?>