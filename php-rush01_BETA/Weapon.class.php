<?php

class weapon
{
	private $_name;
	private $_charge = 0;				/*charge point*/
	private $_Srange = array(0,0);
	private $_Mrange = array(0,0);
	private $_Lrange = array(0,0);
	private $_shootingSide = array('left'=>false, 'right'=>false, 'front'=>false, 'back'=>false);
	private $_effectZone;

	public function shoot()
	{

	}

	public function getShootingSide() {return $this->_shootingSide;}

	private function side_laser()
	{
		$this->_name = 'side_laser';
		$this->_Srange = array(1, 10);
		$this->_Mrange = array(11, 20);
		$this->_Lrange = array(21, 30);
		$this->_shootingSide['left'] = true;
		$this->_shootingSide['right'] = true;
		$this->_effectZone = 'side_laser';
	}
	private function nautical_lance()
	{
		$this->_name = 'nautical_lance';
		$this->_Srange = array(1, 30);
		$this->_Mrange = array(31, 60);
		$this->_Lrange = array(61, 90);
		$this->_shootingSide['front'] = true;
		$this->_effectZone = 'line_from_the_front';
	}
	private function close_range_super_heavy()
	{
		$this->_name = 'close_range_super_heavy';
		$this->_charge = 3;
		$this->_Srange = array(1, 3);
		$this->_Mrange = array(4, 7);
		$this->_Lrange = array(8, 10);
		$this->_effectZone = 'within range';
		foreach($this->_shootingSide as $side)
			$side = true;
	}
	private function macro_canon()
	{
		$this->_name = 'macro_canon';
		$this->_Srange = array(1, 10);
		$this->_Mrange = array(11, 20);
		$this->_Lrange = array(21, 30);
		$this->_shootingSide['front'] = true;
		$this->_effectZone = 'line_from_the_front';
	}
	public function __contruct($name)
	{
		switch ($name) {
			case 'side_laser':
				$this->side_laser();
				break;
			case 'nautical_lance':
				$this->nautical_lance();
				break;
			case 'heavy_nautical_lance':
				$this->nautical_lance();
				$this->_name = 'Heavy_nautical_lance';
				$this->_charge = 3;
				break;
			case 'close_range_super_heavy':
				$this->close_range_super_heavy();
				break;
			case 'macro_canon':
				$this->side_laser();
		}
		// $this->_name = $kwargs['name'];
		// $this->_charge = $kwargs['charge'];
		// $this->_Srange = $kwargs['srnage'];
		// $this->_Mrange = $kwargs['mrange'];
		// $this->_Lrange = $kwargs['lrange'];
		// $this->_shootingSide = $kwargs['shootingside'];
	}
}
?>