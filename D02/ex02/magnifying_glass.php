#!/usr/bin/php
<?php
if ($argc == 2)
{
    $file = file($argv[1]);
    foreach ($file as $line)
    {
        $frmt = '/<a.*title="(.*)"/';
        $line = preg_replace_callback($frmt, function ($matches) { 
                                        return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));}, $line);
            $frmt2 = '/<a.*?>(.*)</';
        $line = preg_replace_callback($frmt2, function ($matches) {
                                        return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
        }, $line);
        echo $line;
    }
}
?>