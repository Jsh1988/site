$(document).ready(function(){

	$('#autocomplete').autocomplete({
		source: path + 'search/',
		minLength: 3,
		select: function( event, ui ){
			//console.log(ui.item.value);
			window.location = path + 'search/?search=' + encodeURIComponent(ui.item.value);
		}
	});

});