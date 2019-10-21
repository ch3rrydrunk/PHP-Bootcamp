$(document).ready(function(){
	$('.menubutton').click(function(){
		if ($('#game_info').is(":hidden"))
			$('#game_info').show();
		else
			$('#game_info').hide();
	});

	$('#123').submit(function(){
		$.ajax({
			type: 'POST',
			url:'game.php',
			success:function(){
				window.location.href='game.php';
			}
		})
		return false;
	});
});
