<?php
	session_start();

    if (isset($_GET["active_game"]))
?>

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="game.js"></script>
<link href="styles.css" rel="stylesheet" type="text/css"/>	
<title>Game</title>
<link rel="icon" type="image/gif" href="https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/rocket-512.png" />
	<!-- <table> -->
	<?php
		// for ($i = 0; $i < 150; $i++) {
	?>
			<!-- <tr> -->
	<?php
			// for ($j = 0; $j < 100; $j++) {
	?>
				<!-- <td> -->
				<?php echo str_pad($i.$j, 4); ?>
				<!-- </td> -->
	<?php
			// }
	?>
			<!-- </tr> -->
	<?php
		// }

	?>
	<!-- </table> -->
	<body>
	<div id="cdiv" style="width:1200px;height:1200px;margin:auto;margin-top:10px;"/>
	<script>
	</script>
	</body>
</html>
<?php
	// require_once("Game.class.php");
	// if(($_POST['game_id'])){
	// 	$currentGame = new Game($_POST['game_id']);
	// } else {
	// 	$currentGame = new Game();
	// 	return $currentGame->getGameId();
	// }
	

	// while (!$currentGame->isStarted()){
	// 	$currentGame->placeShips();
	// 	if ($currentGame->playerMadeTurn()){
?>
			<!-- <script>src="game.js"></script>  -->
<?php
	// 	}
	// }
