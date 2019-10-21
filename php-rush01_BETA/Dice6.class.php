<?php
abstract class Dice6
{
	// wait for number of throws
	static function throwDice($kwargs)
	{
		$count = intval($kwargs);
		if ($count == 0){
			$count = 1;
		}
		for ($i = 0; $i < $count; $i++){
			$sum += rand(1, 6);
		}
		return $sum;
	}
}

$throws = Dice6::throwDice('2');
echo "$throws\n";
?>