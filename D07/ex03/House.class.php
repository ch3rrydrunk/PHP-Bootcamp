<?php

abstract class House
{
    abstract function getHouseName();
    abstract function getHouseMotto();
    abstract function getHouseSeat();

    public function introduce()
    {
        $name = $this->getHouseName();
        $motto = $this->getHouseMotto();
        $seat = $this->getHouseSeat();
        echo "House $name of $seat : \"$motto\"" . PHP_EOL;
    }
}

?>