<?php

abstract class Fighter
{
    public $type;

    public abstract function fight($target);

    public function __construct($type)
    {
        $this->type = $type;
    }
    
	public function __toString() {
		return $this->name;
	}
}

?>