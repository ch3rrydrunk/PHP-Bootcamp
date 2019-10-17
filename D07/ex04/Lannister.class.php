<?php

class Lannister
{
    public function sleepWith($x)
    {
        if (($x instanceof Cersei) || ($x instanceof Jaime))
            echo "With pleasure, but only in a tower in Winterfell, then.". PHP_EOL;
        else if ($x instanceof Lannister)
            echo "Not even if I'm drunk !". PHP_EOL;
        else if ($x instanceof Stark)
            echo "Let's do this." . PHP_EOL;
    }
}
?>