<?php
require_once "Vertex.class.php";

class Vector 
{
    private $_x = 0.0;
    private $_y = 0.0;
    private $_z = 0.0;
    private $_w = 0.0;

    public static $verbose = FALSE;

    // Getters for Vector fields
    public function getX() { return $this->_x; }
    public function getY() { return $this->_y; }
    public function getZ() { return $this->_z; }
    public function getW() { return $this->_w; }

    // Initialize from destination Vertex or destination+origin Vertices 
    public function __construct($kwargs)
    {
        $dest = $kwargs['dest'];
        $orig = $kwargs['orig'];
        if (is_a($orig, 'Vertex') && is_a($dest, 'Vertex'))
        {
            $this->_x = $dest->getX() - $orig->getX();
            $this->_y = $dest->getY() - $orig->getY();
            $this->_z = $dest->getZ() - $orig->getZ();
            $this->_w = $orig->getW();
        }
        else if (!is_a($dest, 'Vertex'))
        {
            echo "Please pass Vector a destination Vertex" . PHP_EOL;
            return ;
        }
        else
        {
            $orig = new Vertex(array('x' => 0.0,
                                'y' => 0.0,
                                'z' => 0.0,
                                'w' => 1.0,
                                "color" => new Color(array('red' => 255, 'green' => 255, 'blue' => 255))));
            $this->_x = $dest->getX() - $orig->getX();
            $this->_y = $dest->getY() - $orig->getY();
            $this->_z = $dest->getZ() - $orig->getZ();
            $this->_w = $orig->getZ();
        }

        if (Vector::$verbose)
            echo $this. " constructed" . PHP_EOL;
    }

    public function __destruct()
    {
        if (Vector::$verbose)
            echo $this . " destructed" . PHP_EOL;
    }

    public function __toString()
    {
        return (sprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
    }

    public function __clone()
    {
        $this->_x = $this->_x; 
        $this->_y = $this->_y; 
        $this->_z = $this->_z;
        $this->_w = $this->_w;
    }

    // Returns documentation
    public static function doc()
    {
        echo file_get_contents('Vector.doc.txt') . PHP_EOL;
        return ;
    }

    // Returns the vector's L2 norm aka length
    public function magnitude()
    {
        return (sqrt($this->_x ** 2 + $this->_y ** 2 + $this->_z ** 2));
    }

    // Returns normalized vector
    public function normalize()
    {
        $norm = $this->magnitude();
        $x = $this->_x / $norm;
        $y = $this->_y / $norm;
        $z = $this->_z / $norm;
        return (new Vector( array ( "dest" => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z)))));
    }

    // Returns sum of vectors
    public function add(Vector $vctr)
    {
        $x = $this->_x + $vctr->getX();
        $y = $this->_y + $vctr->getY();
        $z = $this->_z + $vctr->getZ();
        return (new Vector( array ( "dest" => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z)))));
    }

    // Returns result of vector substraction
    public function sub(Vector $vctr)
    {
        $x = $this->_x - $vctr->getX();
        $y = $this->_y - $vctr->getY();
        $z = $this->_z - $vctr->getZ();
        return (new Vector( array ( "dest" => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z)))));
    }

    // Returns opposite vector
    public function opposite()
    {
        $x = -($this->_x);
        $y = -($this->_y);
        $z = -($this->_z);
        return (new Vector( array ( "dest" => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z)))));
    }

    // Returns a product of the vector and given scalar
    public function scalarProduct($k)
    {
        if (is_int($k) || is_float($k) || is_double($k))
        {
            $x = $this->_x * $k;
            $y = $this->_y * $k;
            $z = $this->_z * $k;
            return (new Vector( array ( "dest" => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z)))));
        }
        else
        {
            echo "Please, pass 'scalarProduct' int, float or double" . PHP_EOL;
            return ;
        }
    }

    // Returns dot product of 2 vectors
    public function dotProduct(Vector $vctr)
    {
        $x = $this->_x * $vctr->getX();
        $y = $this->_y * $vctr->getY();
        $z = $this->_z * $vctr->getZ();
        return ($x + $y + $z);
    }

    /* Returns the cosine of 2 Vectors
    (as dot product of normalize forms) */
    public function cos(Vector $vctr)
    {
        $dp = $this->dotProduct($vctr);
        return ($dp / ($this->magnitude() * $vctr->magnitude()));
    }

    // Returns cross product (as a dot product multiplied by sin)
    // sin(x) = sqrt(1 - cos(x)^2)
    public function crossProduct(Vector $vctr)
    {
        $x = $this->_y * $vctr->getZ() - $this->_z * $vctr->getY();
        $y = $this->_z * $vctr->getX() - $this->_x * $vctr->getZ();
        $z = $this->_x * $vctr->getY() - $this->_y * $vctr->getX();
        return (new Vector( array ( "dest" => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z)))));
    }
}
?>