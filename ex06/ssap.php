#!/usr/bin/php
<?php
    function ft_split($var)
    {
        $tab = preg_split("/[\s]+/", trim($var));
        return($tab);
    }

    if ($argc >= 2)
    {
        $args = array_splice($argv, 1, count($argv));
        $words = array();
        foreach ($args as $arg)
            $words = array_merge($words, ft_split($arg));
        sort($words);
        foreach ($words as $word)
            echo $word."\n";
    }
?>