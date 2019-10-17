<?php

class Tyrion extends Lannister
{
    public function sleepWith($x)
    {
        if ($x instanceof Lannister)
            echo "Not even if I'm drunk !". PHP_EOL;
        else if ($x instanceof Stark)
            echo "Let's do it." . PHP_EOL;
    }
}

?>