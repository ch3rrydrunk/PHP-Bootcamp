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
        return (sqrt($this->_x ** 2 + $this->_y ** 2 + $this->_z ** 2));
    }

    // Returns normalized vector
    public function normalized()
    {
        $norm = $this->magnitude();
        $x = $this->_x / $norm;
        $y = $this->_y / $norm;
        $z = $this->_z / $norm;
        return (new Vector(Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
    }

    // Returns sum of vectors
    public function add(Vector $vctr)
    {
        $x = $this->_x + $vctr->getX();
        $y = $this->_y + $vctr->getY();
        $z = $this->_z + $vctr->getZ();
        return (new Vector(Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
    }

    // Returns result of vector substraction
    public function sub(Vector $vctr)
    {
        $x = $this->_x - $vctr->getX();
        $y = $this->_y - $vctr->getY();
        $z = $this->_z - $vctr->getZ();
        return (new Vector(Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
    }

    // Returns opposite vector
    public function negative()
    {
        $x = -($this->_x);
        $y = -($this->_y);
        $z = -($this->_z);
        return (new Vector(Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
    }

    // Returns a product of the vector and given scalar
    public function scalarProduct($k)
    {
        if (is_int($k) || is_float($k) || is_double($k))
        {
            $x = $this->_x * $k;
            $y = $this->_y * $k;
            $z = $this->_z * $k;
            return (new Vector(Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
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
    (as dot product of normalized forms) */
    public function cos(Vector $vctr)
    {
        return (($this->normalized())->dotProduct($vctr->normalized()));
    }

    // Returns cross product (as a dot product multiplied by sin)
    // sin(x) = sqrt(1 - cos(x)^2)
    public function crossProduct(Vector $vctr)
    {
        $x = $this->_y * $vctr->getZ() - $this->_z * $vctr->getY();
        $y = $this->_z * $vctr->getX() - $this->_x * $vctr->getZ();
        $z = $this->_x * $vctr->getY() - $this->_y * $vctr->getX();
        return (new Vector(Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
    }
}

?>