<?php

class Ship
{
	private $_name; 		/* name of the ship */
	private $_sizeX;		/* width of the ship */
	private $_sizeY;		/* height of the ship */
	private $_sprite;		/* representation of the ship on the grid */
	private $_hoolPoints;	/* life points of the ship */
	private $_enginePower;	/* The engine power gives the ship a number of points that the
							players will be able to attribute to different actions when activating a ship
							depending on situations. Those will be "power points" shortened with PP. */
	private $_speed;		/* Maximum number of cells that the ship can move each turn */
	private $_handling;		/* Number of cells that a ship that moved on the prior turn needs to
								travel straight this turn if he wants to stay stationery for the next one */
	private $_shield;		/*Number of damage points that a ship can endure before losing his hull points */
	private $_weapons;		/* List of weapons that ship owns, generally one or two, sometimes more for the really big ships */
	private $_stageinnery;

	public function __construct()
	{

	}

	public function		setPosition($x, $y)
	{
		$this->_x = $x;
		$this->_y = $y;
	}

	public function		setDirection($dir)
	{
		if ($dir < 0 || $dir > 3)
			$dir = 0;
		$this->_direction = $dir;
	}

	public function getName() { return $this->_name; }
	public function getSizeX() { return $this->_sizeX; }
	public function getSizeY() { return $this->_sizeY; }
	public function getSprite() { return $this->_sprite; }
	public function getHoolPoints() { return $this->_hoolPoints; }
	public function getEnginePower() { return $this->_enginePower; }
	public function getSpeed() { return $this->_speed; }
	public function getHandling() { return $this->_handling; }
	public function getShield() { return $this->_shield; }
	public function getWeapons() { return $this->_weapons; }
}
?>