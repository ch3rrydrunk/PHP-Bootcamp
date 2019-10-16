<?php 
class Color
{
    public $red = 0;
    public $green = 0;
    public $blue = 0;
    public static $verbose = FALSE;

    public function __construct($kwargs)
    {
        if (isset($kwargs["rgb"]))
        {
            $int_col = intval($kwargs["rgb"]);
            $this->blue = $int_col & 0xff;
            $this->green = ($int_col >> 8) & 0xff;
            $this->red = ($int_col >> 16) & 0xff;
        }
        if (isset($kwargs["red"]))
            $this->red = intval($kwargs["red"]);
        if (isset($kwargs["green"]))
            $this->green = intval($kwargs["green"]);
        if (isset($kwargs["blue"]))
            $this->blue = intval($kwargs["blue"]);

        if (Color::$verbose)
            echo $this . " constructed." . PHP_EOL;

        return ;
    }

    public function __toString()
    {
        return sprintf("Color( red:%4s, green:%4s, blue:%4s )", 
                        $this->red, $this->green, $this->blue);
    }

    public function __destruct()
    {
        if (Color::$verbose)
            echo $this . " destructed." . PHP_EOL;
        return ;
    }

    public static function doc()
    {
        $str = file_get_contents("Color.doc.txt") . PHP_EOL;
        return $str;
    }

    public function add($clr)
    {
        $blue = $this->blue + $clr->blue;
        $green = $this->green + $clr->green;
        $red = $this->red + $clr->red;
        $new = new Color(['red' => $red, 'green' => $green, 'blue' => $blue]);

        // if (Color::$verbose)
        // {
        //     print("Color after addition is:" . PHP_EOL . $new);
        // }

        return $new;
    }

    public function sub($clr)
    {
        $blue = $this->blue - $clr->blue;
        $green = $this->green - $clr->green;
        $red = $this->red - $clr->red;
        $new = new Color(['red' => $red, 'green' => $green, 'blue' => $blue]);

        // if (Color::$verbose)
        // {
        //     print("Color after substraction is:" . PHP_EOL . $new);
        // }

        return $new;
    }

    public function mult($f)
    {
        $blue = intval($this->blue * $f);
        $green = intval($this->green * $f);
        $red = intval($this->red * $f);
        $new = new Color(['red' => $red, 'green' => $green, 'blue' => $blue]);

        // if (Color::$verbose)
        // {
        //     print("Color after multiplication is:" . PHP_EOL . $new);
        // }

        return $new;
    }
}
/*
Formula for color int mix spliting
B = C % 256
G = ((C-B)/256) % 256
R = ((C-B)/256**2) - G/256
*/
?>