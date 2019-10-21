<?php
class Obstacle
{
	private $_positionX;
	private $_positionY;
	private $_posY;
	private $_posX;
	private $_sizeX;
	private $_sizeY;
	private $_type;

	static private $_predefinedTypes = array(
		'a' => 'asteroid',
		's' => 'space station',
		'd' => 'space debris',
		'w' => 'worm-hole'
	);

	public function __construct($posX, $posY, $type = NULL)
	{
		$this->_predefinedTypes = 
		$this->_posX = $posX;
		$this->_posY = $posY;
		if (isset($type)){
			$this->_type = $type;
		} else {
			$this->_type = Self::$_predefinedTypes[array_rand(Self::$_predefinedTypes)];
		}
		$this->_sizeX = rand(3, 5);
		$this->_sizeY = rand(3, 5);
	}

	public function getType()
	{
		foreach (Self::$_predefinedTypes as $key => $type) {
			if ($type === $this->_type){
				return $key;
			}
		}
		return strtoupper($this->_type[0]);
	}

	public function getSizeX() { return $this->_sizeX; }
	public function getSizeY() { return $this->_sizeY; }
	public function getPositionX() { return $this->_positionX; }
	public function getPositionY() { return $this->_positionY; }
}

$obstacle = new Obstacle(10, 10);
$a = $obstacle->getType();
$b = $obstacle->getSizeX();
$c  = $obstacle->getSizeY();
echo "$a--$b--$c\n";

?>