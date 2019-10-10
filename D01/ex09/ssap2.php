#!/usr/bin/php
<?php
    function ft_split($var)
    {
        $tab = preg_split("/[\s]+/", trim($var));
        return($tab);
    }

    function compare($a, $b)
    {
        $a = strtolower($a);
        $b = strtolower($b);
        $size_a = strlen($a);
        $size_b = strlen($b);
        $size = min($size_a, $size_b);
        $chars_a = str_split($a);
        $chars_b = str_split($b);
        for ($i = 0; $i < $size; $i++)
            if ($chars_a[$i] != $chars_b[$i])
            {
                if ($chars_a[$i] >= 'a' && $chars_a[$i] <= 'z')
                {
                    if ($chars_b[$i] >= 'a' && $chars_b[$i] <= 'z')
                        return ($chars_a[$i] > $chars_b[$i] ? 1 : -1);
                    return (-1);
                }
                else if ($chars_a[$i] >= '0' && $chars_a[$i] <= '9')
                {
                    if ($chars_b[$i] >= 'a' && $chars_b[$i] <= 'z')
                        return (1);
                    else if ($chars_b[$i] >= '0' && $chars_b[$i] <= '9')
                        return ($chars_a[$i] > $chars_b[$i] ? 1 : -1);
                    return (-1);
                }
                else
                {
                    if (($chars_b[$i] >= 'a' && $chars_b[$i] <= 'z')
                        || ($chars_b[$i] >= '0' && $chars_b[$i] <= '9'))
                        return (1);
                    return ($chars_a[$i] > $chars_b[$i] ? 1 : -1);
                }
            }
        if ($size_a != $size_b)
            return ($size_a > $size_b ? 1 : -1);
        return (0);
    }

    if ($argc >= 2)
    {
        $args = array_splice($argv, 1, count($argv));
        $words = array();
        foreach ($args as $arg)
            $words = array_merge($words, ft_split($arg));
        usort($words, "compare");
        foreach ($words as $w)
            echo $w."\n";
    }
?>