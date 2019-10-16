<?php
require_once 'Color.class.php';

class Vertex
{
    private $_x = 0.0;
    private $_y = 0.0;
    private $_z = 0.0;
    private $_w = 1.0;
    private $_color;
    
    public static $verbose = FALSE;

    public function getX() { return floatval($this->_x); }
    public function getY() { return floatval($this->_y); }
    public function getZ() { return floatval($this->_z); }
    public function getW() { return floatval($this->_w); }
    public function getColor() { return $this->_color; }

    public function setX( float $x ) { $this->_x = $x; return ; } 
    public function setY( float $y ) { $this->_y = $y; return ; } 
    public function setZ( float $z ) { $this->_z = $z; return ; } 
    public function setW( float $w ) { $this->_w = $w; return ; } 
    public function setColor( $color ) { $this->_color = $color; return ; }

    public function __construct($kwargs)
    {
        if (isset($kwargs["x"]))
            $this->_x = floatval($kwargs["x"]);
        if (isset($kwargs["y"]))
            $this->_y = floatval($kwargs["y"]);
        if (isset($kwargs["z"]))
            $this->_z = floatval($kwargs["z"]);
        if (isset($kwargs["w"]))
            $this->_w = floatval($kwargs["w"]);
        if (isset($kwargs["color"]))
            $this->_color = $kwargs["color"];
        else
            $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));

        if (Vertex::$verbose)
            echo $this . " constructed" . PHP_EOL;

        return ;
    }

    public function __clone()
    {
        $this->_x = $this->_x; 
        $this->_y = $this->_y; 
        $this->_z = $this->_z;
        $this->_w = $this->_w;
        $this->_color = $this->_color;
    }

    public function __toString()
    {
        if (Vertex::$verbose)
            return sprintf("Vertex( x:%5.2f, y:%5.2f, z:%4.2f, w:%4.2f, %s )", 
                        $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
        else
            return sprintf("Vertex( x:%5.2f, y:%5.2f, z:%4.2f, w:%4.2f )", 
                        $this->_x, $this->_y, $this->_z, $this->_w);
    }

    public function __destruct()
    {
        if (Vertex::$verbose)
            echo $this . " destructed" . PHP_EOL;
        return ;
    }

    public static function doc()
    {
        $str = file_get_contents("Vertex.doc.txt") . PHP_EOL;
        return $str;
    }
}
?>