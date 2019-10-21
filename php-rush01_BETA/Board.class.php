<?php
require_once("Obstacle.class.php");

// Array of 100x150 filled with spaces or letters according to debris
// Implements: ->print_board method
class Board
{
	private $_board = array();
	private $_sizeX = 150;
	private $_sizeY = 100;

	public function __construct()
	{
		for ($i = 0; $i < $this->_sizeX; $i++){
			for ($j = 0; $j < $this->_sizeY; $j++)
				$this->_board[$i][$j] = ' ';
		}
		for ($i = 0; $i < $this->_sizeX; $i++){
			for ($j = 0; $j < $this->_sizeY; $j++){
				if (($i < 5 && $j < 35) ||
				($j > $this->_sizeY - 5 && $i > $this->_sizeX - 5)){
					continue;
				}
				if ($this->_board[$i][$j] === ' '){
					if (rand(0, 1000) < 3){
						$this->_board[$i][$j] = new Obstacle($i, $j);
						$width = $this->_board[$i][$j]->getSizeX();
						$height = $this->_board[$i][$j]->getSizeY();
						for ($height = $this->_board[$i][$j]->getSizeY();$height > 0;--$height){
							for ($width = $this->_board[$i][$j]->getSizeX(); $width > 0; --$width){
								$a = $i + $width - 1;
								$b = $j + $height - 1;
								$this->_board[$a][$b] = &$this->_board[$i][$j];
							}
						}
					}
				}
			}
		}
	}

	public function print_board()
	{
		for ($i = 0; $i < $this->_sizeY; $i++){
			for ($j = 0; $j < $this->_sizeX; $j++){
				if ($this->_board[$j][$i] instanceof Obstacle){
					if ($this->_board[$j][$i]->getPositionX() == $j &&
						$this->_board[$j][$i]->getPositionY() == $i){
							unset($this->_board[$j][$i]);
							continue;
						}
					echo $this->_board[$j][$i]->getType();
				} else {
					echo '.';
				}
			}
			echo "\n";
		}
	}
}

$field = new Board();
$field->print_board();

?>