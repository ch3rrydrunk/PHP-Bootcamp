$(window).on("load",function(){
	$.ajax({
		url: 'getProfile.php',
		dataType: 'json'
	})
	.done(function(out){
		new_el(out['login'], "login", '#profinfo');
		new_el(out['rank'], "rank", '#profinfo');
		new_el(out['aboutme'], "aboutme", '#profinfo');
		$('.aboutme').find('div').attr('contenteditable', 'true');
		$('#svin').bind('click', function (){
			$.ajax({
				method: 'POST',
				url: 'saveinfo.php',
				data: {'aboutme':$('.aboutme').find('.pinfo').text()}
			});
		})
	});
})




function new_el(data, name, where)
{
	var el  = $('<div/>', {
		text: name,
		class: name
	});
	$(where).append(el);
	$(el).append('</br>');
	var new_el  = $('<div/>', {
		text: data,
		class: 'pinfo'
	});
	$(el).append(new_el);
}