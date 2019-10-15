<?php
require_once "Vertex.class.php";

class Vector
{
    private $_x = 0.0;
    private $_y = 0.0;
    private $_z = 0.0;
    private $_w = 0.0;

    // Initialize from destination Vertex or destination+origin Vertices 
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

        if (Vector::verbose)
            echo strval($this). " destructed" . PHP_EOL;
    }

    public function __destruct()
    {
        if (Vector::verbose)
            echo strval($this). " destructed" . PHP_EOL;
    }

    public function __toString()
    {
        return (sprintf("Vector( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
    }

    // Returns documentation
    public static function doc()
    {
        echo file_get_contents('Vector.doc.txt') . PHP_EOL;
    }

    // Returns the vector's L2 norm aka length
    public function magnitude()
    {

    }
}
?>