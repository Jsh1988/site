$(document).ready(function(){
	

/*comments*/
$('#errors').dialog({
		autoOpen: false,
		width: 450,
		modal: true,
		title: 'Сообщение ошибки:',
		show: {effect: 'slide', duration: 700},//показать
		hide: {effect: 'explode', duration: 700} //спрятать
	});
		
	$('.form-comments').dialog({
		autoOpen: false,
		width: 450,
		modal: true,
		title: 'Добавление комментария',
		resizable: false,//изменение размера
		draggable: false,//перетаскивание
		show: {effect: 'slide', duration: 700},//показать
		hide: {effect: 'explode', duration: 700},//спрятать
		buttons: {
			"Добавить комментарий": function(){
				var commentFirstname = $.trim($('#comment_firstname').val());
				var commentSurname = $.trim($('#comment_surname').val());
				var commentText = $.trim($('#comment_text').val());//trim обрезает концевые пробелы
				var parent = $('#parent').val();
				var productId = id;
				
				if(commentFirstname == '' || commentSurname == '' || commentText == ''){
					
					$('#errors').text('Заполните поля');
							$('#errors').delay(1000).queue(function(next){
								$(this).dialog('open');
								next();
							});
					
				}
				$('#comment_text').val('');
				$(this).dialog('close');
				
				$.ajax({
					url: path + 'comment',//куда отправляем
					type: 'POST',//метод
					data: {commentFirstname: commentFirstname, commentSurname: commentSurname, commentText: commentText, parent: parent, productId: productId},//что мы отправляем переменая и значение
					beforeSend: function(){
						$('#loader').fadeIn();//показываем картинку
					},//до отправки					
					success: function(res){
						var result = JSON.parse(res); 
						//console.log(result);
					  if(result.answer == 'Комментарий добавлен!'){
							//если комментарий добавлен
							var showComment = '<li class="new-comment" id="comment-'+ result.id +'" >' + result.code + '</li>';
						if(parent == 0){
						//если это не ответ
							$('ul.comments').append(showComment);//в конец добавляем комментарий							
						}else{
						//если это ответ
						//находим родителя li
						var parentComment = $this.closest('li');//closest ищет ближайшего предка
						//смотрим,есть ли ответы
						var childs = parentComment.children('ul');//find ищет всех потомков в потомков 
						if(childs.length){//length возвращает длину обекта
							//если ответы есть
							childs.append(showComment);
						}else{
							//если ответов нет
							parentComment.append('<ul>'+ showComment +'</ul>');
						} 
					}
					//$('#comment-' + result.id).delay(1000).show('shake', 1000);//обращаемся коментарию устанавливаем паузу и устанавливаем эфект
						}else{
							//если комментарий не добавлен
							$('#errors').text(result.answer);
							$('#errors').delay(1000).queue(function(next){
								$(this).dialog('open');
								next();
							});
							
						}
						
				},//если достучались до сервера
					error: function(){
						
						$('#errors').text("Ошибка");
							$('#errors').delay(1000).queue(function(next){
								$(this).dialog('open');
								next();
							});
					},// если не удолось достучаться до сервера
					complete: function(){
						$('#loader').delay(1000).fadeOut();//скрываем и устанавливаем паузу
					}//после завершения
				});
				
			},
			"Отмена": function(){
				$('#comment_text').val('');
				$(this).dialog('close');
			}
		}
	});

$('.open-form').click(function(){
	$('.form-comments').dialog('open');
		var parent = $(this).children().attr('data');
		$this = $(this);//глобальная переменая 
		if(!parseInt(parent)) parent = 0;
		$('input[name="parent"]').val(parent);
	});
/*comments*/



});
