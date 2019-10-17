<?php

require_once "Fighter.class.php";

class UnholyFactory
{
    private $_unholy;


    public function absorb($soul)
    {
        $class = get_class($soul);
        $type = $soul->type;
        if (isset($this->_unholy[$type]))
            echo "(Factory already absorbed a fighter of type $type)" . PHP_EOL;
        else if (is_a($soul, "Fighter") && !isset($this->_unholy[$type]))
        {
            $this->_unholy[$type] = clone $soul;
            echo "(Factory absorbed a fighter of type $type)" . PHP_EOL;
        }
        else if (!($soul instanceof Fighter))
        {
            echo "(Factory can't absorb this, it's not a fighter)" . PHP_EOL;
        }
        return ;
    }

    public function fabricate($type)
    {
        $soul = $this->_unholy[$type];
        if (!isset($soul))
        {
            echo "(Factory hasn't absorbed any fighter of type )" . PHP_EOL;
            return ;
        }
        else
        {
            echo "(Factory fabricates a fighter of type $type)" . PHP_EOL;
            return (clone $soul);
        }
    }

    public function __construct()
    {
        $this->_unholy = array();
    }
}

?>