<?php
class Game
{
    private $_id;
	private $_board;
	private $_player1;
	private $_player2;
	private $_gameStatus = -1;

	public function __construct($kwargs)
	{
	    if isset($kwargs['login1'], $kwargs['login2'], $kwargs['faction'], $kwargs['fleet_set'])
        {
            $this->_id = md5(random_bytes(32));
            $this->_gameStatus = 0;
            $this->_board = new Board();
            $this->_player1 = new Player($kwargs['login1'], $kwargs['faction'], $kwargs['fleet_set'], "up");
            $this->_player2 = new Player($kwargs['login1'], $kwargs['faction'], $kwargs['fleet_set'], "down");
        }

	}
}
?>