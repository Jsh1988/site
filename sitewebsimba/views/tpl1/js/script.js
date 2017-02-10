$(document).ready(function(){
	$('#accordion').dcAccordion();

	/*открыть блок Восстановить пароль*/
	$('#forgotpass-link').click(function(){
		$('#block_avtorizaciya').fadeOut(300, function(){
			$('#forgotpass').fadeIn();
		});
		return false;
	});
	/*открыть блок Восстановить пароль*/
	/*закрыть блок Восстановить пароль*/	
	$('#authorization-link').click(function(){
		$('#forgotpass').fadeOut(300, function(){
			$('#block_avtorizaciya').fadeIn();
		});
		return false;
	});
	/*закрыть блок Восстановить пароль*/
	
});
