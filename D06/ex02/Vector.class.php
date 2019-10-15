<?php
require_once "Vertex.class.php";

class Vector
{
    private $_x = 0.0;
    private $_y = 0.0;
    private $_z = 0.0;
    private $_w = 0.0;

    public function __construct($kwargs)
    {
        if (is_a($kwargs['dest'], 'Vertex'))
        {
            $dest = $kwargs['dest'];
            $this->$_x = $dest->getX();
            $this->$_y = $dest->getY();
            $this->$_z = $dest->getZ();
        }
        if (is_a($kwargs['orig'], 'Vertex'))
        {
            $orig = $kwargs['orig'];
            $this->$_x = $orig->getX() + $dest->getX();
            $this->$_y = $orig->getY() + $dest->getY();
            $this->$_z = $orig->getZ() + $dest->getZ();
        }
    }
}
?>