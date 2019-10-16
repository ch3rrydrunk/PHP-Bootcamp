<?php
require_once "Vertex.class.php";

class Matrix
{
    const IDENTITY = "IDENTITY";
    const SCALE = "SCALE";
    const RX = "RX";
    const RY = "RY";
    const RZ = "RZ";
    const TRANSLATION = "TRANSLATION";
    const PROJECTION = "PROJECTION";

    public static $verbose = FALSE;

    private $_vctrX;
    private $_vctrY;
    private $_vctrZ;
    private $_vrtxO;

    private $_colX;
    private $_colY;
    private $_colZ;
    private $_colW;

    public function getVctrX() { return ($this->_vctrX); }
    public function getVctrY() { return ($this->_vctrY); }
    public function getVctrZ() { return ($this->_vctrZ); }
    public function getVrtxO() { return ($this->_vctrO); }
    public function getXRow() { return ($this->_colX); }
    public function getYRow() { return ($this->_colY); }
    public function getZRow() { return ($this->_colZ); }
    public function getWRow() { return ($this->_colW); }


    public function setVctrX( Vector $x ) { $this->_vctrX = $x; return ; } 
    public function setVctrY( Vector $y ) { $this->_vctrY = $y; return ; } 
    public function setVctrZ( Vector $z ) { $this->_vctrZ = $z; return ; } 
    public function setVrtxO( Vector $o ) { $this->_vrtxO = $o; return ; } 

    private function make_identity_mtrx($kwargs)
    {
        $this->_vrtxO = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
        $vtxX = new Vertex( array( 'x' => 1.0, 'y' => 0.0, 'z' => 0.0 ) );
        $this->_vctrX = new Vector( array( 'orig' => $this->_vrtxO, 'dest' => $vtxX ) );
        $vtxY = new Vertex( array( 'x' => 0.0, 'y' => 1.0, 'z' => 0.0 ) );
        $this->_vctrY = new Vector( array( 'orig' => $this->_vrtxO, 'dest' => $vtxY ) );
        $vtxZ = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 1.0 ) );
        $this->_vctrZ = new Vector( array( 'orig' => $this->_vrtxO, 'dest' => $vtxZ ) );
        return ;
    }

    private function make_translation_mtrx($kwargs)
    {
        if (isset($kwargs['vtc']))
        {
            $vtc = $kwargs['vtc'];
            $this->_vrtxO = new Vertex( array( 'x' => $vtc->getX(), 'y' => $vtc->getY(), 'z' => $vtc->getZ() ) );
            $vtxX = new Vertex( array( 'x' => 1.0, 'y' => 0.0, 'z' => 0.0 ) );
            $this->_vctrX = new Vector( array( 'dest' => $vtxX ) );
            $vtxY = new Vertex( array( 'x' => 0.0, 'y' => 1.0, 'z' => 0.0 ) );
            $this->_vctrY = new Vector( array( 'dest' => $vtxY ) );
            $vtxZ = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 1.0 ) );
            $this->_vctrZ = new Vector( array( 'dest' => $vtxZ ) );
            return ;
        }
        else
            return (input_error($preset, 'Vertex', 'vtc'));
    }

    private function make_scale_mtrx($kwargs)
    {
        if (isset($kwargs['scale']))
        {
            $f = $kwargs['scale'];
            $this->_vrtxO = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
            $vtxX = new Vertex( array( 'x' => floatval($f), 'y' => 0.0, 'z' => 0.0 ) );
            $this->_vctrX = new Vector( array( 'dest' => $vtxX ) );
            $vtxY = new Vertex( array( 'x' => 0.0, 'y' => floatval($f), 'z' => 0.0 ) );
            $this->_vctrY = new Vector( array( 'dest' => $vtxY ) );
            $vtxZ = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => floatval($f)) );
            $this->_vctrZ = new Vector( array( 'dest' => $vtxZ ) );
            return ;
        }
        else
            return (input_error($preset, 'Numeric value', 'scale'));
    }

    private function make_rotation_mtrx($kwargs, $preset)
    {
        if (isset($kwargs['angle']))
        {
            $angle = $kwargs['angle'];
            $sin = sin($kwargs['angle']);
            $cos = cos($kwargs['angle']);
            switch ($preset)
            {
                case Matrix::RX :
                    $this->_vrtxO = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0) );
                    $vtxX = new Vertex( array( 'x' => 1.0, 'y' => 0.0, 'z' => 0.0, 'w' => 0.0 ) );
                    $this->_vctrX = new Vector( array( 'dest' => $vtxX ) );
                    $vtxY = new Vertex( array( 'x' => 0.0, 'y' => $cos, 'z' => $sin, 'w' => 0.0 ) );
                    $this->_vctrY = new Vector( array( 'dest' => $vtxY ) );
                    $vtxZ = new Vertex( array( 'x' => 0.0, 'y' => -$sin, 'z' => $cos, 'w' => 0.0 ) );
                    $this->_vctrZ = new Vector( array( 'dest' => $vtxZ ) );
                    return ;
                case Matrix::RY :
                    $this->_vrtxO = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0) );
                    $vtxX = new Vertex( array( 'x' => cos(-$angle), 'y' => 0.0, 'z' => sin(-$angle), 'w' => 0.0 ) );
                    $this->_vctrX = new Vector( array( 'dest' => $vtxX ) );
                    $vtxY = new Vertex( array( 'x' => 0.0, 'y' => 1.0, 'z' => 0.0, 'w' => 0.0 ) );
                    $this->_vctrY = new Vector( array( 'dest' => $vtxY ) );
                    $vtxZ = new Vertex( array( 'x' => -sin(-$angle), 'y' => 0.0, 'z' => cos(-$angle), 'w' => 0.0 ) );
                    $this->_vctrZ = new Vector( array( 'dest' => $vtxZ ) );
                    return ;
                case Matrix::RZ :
                    $this->_vrtxO = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0) );
                    $vtxX = new Vertex( array( 'x' => cos($angle), 'y' => sin($angle), 'z' => 0.0, 'w' => 0.0 ) );
                    $this->_vctrX = new Vector( array( 'dest' => $vtxX ) );
                    $vtxY = new Vertex( array( 'x' => -sin($angle), 'y' => cos($angle), 'z' => 0.0, 'w' => 0.0 ) );
                    $this->_vctrY = new Vector( array( 'dest' => $vtxY ) );
                    $vtxZ = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 1.0, 'w' => 0.0 ) );
                    $this->_vctrZ = new Vector( array( 'dest' => $vtxZ ) );
                    return;
            }
        }
        else
            return (input_error($preset, 'Angle as float', 'angle'));
    }

    private function make_projection_mtrx($kwargs)
    {
        if (isset($kwargs['fov'], $kwargs['fov'], $kwargs['near'], $kwargs['far']))
        {
            $fov = deg2rad($kwargs['fov']);
            $rat = $kwargs['ratio'];
            $n = $kwargs['near'];
            $f = $kwargs['far'];
            $this->_vrtxO = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => -(2 * $f * $n) / ($f - $n), 'w' => 0.0) );
            $vtxX = new Vertex( array( 'x' => 1 / ($rat * tan($fov / 2)), 'y' => 0.0, 'z' => 0.0, 'w' => 0.0 ) );
            $this->_vctrX = new Vector( array( 'dest' => $vtxX ) );
            $vtxY = new Vertex( array( 'x' => 0.0, 'y' => 1 / tan($fov / 2), 'z' => 0.0, 'w' => 0.0 ) );
            $this->_vctrY = new Vector( array( 'dest' => $vtxY ) );
            $vtxZ = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => -($f + $n) / ($f - $n)) );
            $tmpVrtx = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => -1.0) );
            $this->_vctrZ = new Vector( array( 'dest' => $vtxZ, 'orig' => $tmpVrtx) );
            return;
        }
        else
            return (input_error($preset,
                        'fov as degrees || ratio as float || near/far as float',
                            'angle || ratio || near || far'));
    }

    public function __construct($kwargs)
    {
        $preset = $kwargs['preset'];
        if ($preset == Matrix::IDENTITY)
            $this->make_identity_mtrx($kwargs);    
        else if ($preset == Matrix::TRANSLATION)
            $this->make_translation_mtrx($kwargs);
        else if ($preset == Matrix::SCALE)
            $this->make_scale_mtrx($kwargs);
        else if ($preset == Matrix::RX ||
                    $preset == Matrix::RY ||
                        $preset == Matrix::RZ)
            $this->make_rotation_mtrx($kwargs, $preset);
        else if ($preset == Matrix::PROJECTION)
            $this->make_projection_mtrx($kwargs);

        if (isset($preset))
        {
            $this->$_colX = new Vector(
                array( "dest" => new Vertex (
                    array('x' => $this->_vctrX->getX(), 'y' => $this->_vctrY->getX(),
                        'z' => $this->_vctrZ->getX(), 'w' => $this->_vrtxO->getX()))));
            $this->$_colY = new Vector(
                array( "dest" => new Vertex (
                    array('x' => $this->_vctrX->getY(), 'y' => $this->_vctrY->getY(),
                        'z' => $this->_vctrZ->getY(), 'w' => $this->_vrtxO->getY()))));
            $this->$_colZ = new Vector(
                array( "dest" => new Vertex (
                    array('x' => $this->_vctrX->getZ(), 'y' => $this->_vctrY->getZ(),
                        'z' => $this->_vctrZ->getZ(), 'w' => $this->_vrtxO->getZ()))));
            $this->$_colO = new Vector(
                array( "dest" => new Vertex (
                    array('x' => $this->_vctrX->getW(), 'y' => $this->_vctrY->getW(),
                        'z' => $this->_vctrZ->getW(), 'w' => $this->_vrtxO->getW()))));
        }

        if (Matrix::$verbose)
        {
            $odd = $preset === Matrix::IDENTITY ? "" : " preset";
            echo "Matrix " . $preset . $odd ." instance constructed" . PHP_EOL;
        }
    }
    
    // public function mult(Matrix $mtrx)
    // {
    //     $this->_vrtxO = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );

    //     $vtxX = new Vertex( array( 'x' => $this->getXrow->dotProduct($mtrx->getVctrX),
    //                                 'y' => $this->getYrow->dotProduct($mtrx->getVctrY),
    //                                 'z' => $this->getZrow->dotProduct($mtrx->getVctrZ),) );
    //     $vctrX = new Vector( array( 'orig' => $this->_vrtxO, 'dest' => $vtxX ) );
    //     $vtxY = new Vertex( array( 'x' => 0.0, 'y' => 1.0, 'z' => 0.0 ) );
    //     $this->_vctrY = new Vector( array( 'orig' => $this->_vrtxO, 'dest' => $vtxY ) );
    //     $vtxZ = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 1.0 ) );
    //     $this->_vctrZ = new Vector( array( 'orig' => $this->_vrtxO, 'dest' => $vtxZ ) );
    //     return ;
    // }
    // Returns documentation
    public static function doc()
    {
        echo file_get_contents('Vector.doc.txt') . PHP_EOL;
        return ;
    }

    public function __toString()
    {
        $header = "M | vtcX | vtcY | vtcZ | vtxO" . PHP_EOL .
                    "-----------------------------" . PHP_EOL;
        $x = sprintf("x | %3.2f | %3.2f | %3.2f | %3.2f\n",
                        $this->_vctrX->getX(), $this->_vctrY->getX(), $this->_vctrZ->getX(), $this->_vrtxO->getX());
        $y = sprintf("y | %3.2f | %3.2f | %3.2f | %3.2f\n",
                        $this->_vctrX->getY(), $this->_vctrY->getY(), $this->_vctrZ->getY(), $this->_vrtxO->getY());
        $z = sprintf("z | %3.2f | %3.2f | %3.2f | %3.2f\n",
                        $this->_vctrX->getZ(), $this->_vctrY->getZ(), $this->_vctrZ->getZ(), $this->_vrtxO->getZ());
        $w = sprintf("w | %3.2f | %3.2f | %3.2f | %3.2f\n",
                        $this->_vctrX->getW(), $this->_vctrY->getW(), $this->_vctrZ->getW(), $this->_vrtxO->getW());
        return ($header . $x . $y . $z . $w);

    }

    private function input_error($preset, $req, $field)
    {
        echo "Please, input" . $req . "to " . $preset . " Matrix as " . $field . " array field." . PHP_EOL;
        return (-1);
    }

}
?>