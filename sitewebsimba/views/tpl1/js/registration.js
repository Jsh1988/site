$(document).ready(function(){

	//регестрация
	$('.access').change(function(){
			var $this = $(this);
			var val = $.trim($this.val());
			var dataField = $this.attr('data-field');//получаем значение нужного атрибута
			var span = $(this).next();
			//
			if(val == ''){
				span.removeClass().addClass('registration-lo2');
			}else{
				span.removeClass().addClass('registration-loader');
				$.ajax({
					url: path + 'registration',
					type: 'POST',
					data: {val: val, dataField: dataField},
					success: function(res){
						//console.log(res);
						var result = JSON.parse(res);
						if( result.reg == ﻿"no" ){
							span.removeClass().addClass('registration-cross');
						}else{
							span.removeClass().addClass('registration-check');
						}
					}
				});
			}
		});
	//регестрация

});
