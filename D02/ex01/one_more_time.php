#!/usr/bin/php
<?php
    setlocale(LC_TIME, "fr_FR");
    date_default_timezone_set("Europe/Paris");
    if ($argc >= 2)
    {
        $frmt = "/^[A-Za-z]+ [0-9]{1,2} [A-Za-z]+ [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}$/";
        if (preg_match($frmt, $argv[1]));
        {
            $frmt = "%A %e %B %Y %H:%M:%S";
            if (($t = strptime($argv[1], $frmt)) != FALSE)
            {
                $utime = mktime($t[tm_hour], $t[tm_min], 
                    $t[tm_sec], $t[tm_mon] + 1, $t[tm_mday], $t[tm_year] + 1900);
                print("$utime\n");
            }
            else
                echo "Wrong Format\n";
        }
    }
?>