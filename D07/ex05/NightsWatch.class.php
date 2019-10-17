<?php

class NightsWatch
{
    private $_squad;

    public function __construct()
    {
        $this->_squad = array();
    }

    public function recruit($soulja)
    {
        if (is_a($soulja, "IFighter"))
        {
            array_push($this->_squad, $soulja);
        }
        return ;
    }

    public function fight()
    {
        foreach ($this->_squad as $soulja)
        {
            $soulja->fight();
        }
        return ;
    }
}

?>