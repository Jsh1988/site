$(document).ready(function(){

	//var data = [{ "date": "2015-09-21 10:15:20", "title": "Заметка 1", "description": "Описание 1", "url": "" }]; 
	
	$('.eventCalendar').eventCalendar({
		jsonData: data,
		//jsonDateFormat: 'human', //для "date": "2015-09-21 10:15:20"
		openEventInNewWindow: true, // для открытия в новом окне
		dateFormat: 'dddd DD-MM-YYYY', // показ даты
		locales: {
			locale: "ru",
			txt_noEvents: "Нет запланированных событий",
			txt_SpecificEvents_prev: "",
			txt_SpecificEvents_after: "события:",
			txt_NextEvents: "Следующие события:",
			txt_GoToEventUrl: "Смотреть",
			moment: {
				"months" : [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
						"Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
				"monthsShort" : [ "Янв", "Фев", "Мар", "Апр", "Май", "Июн",
						"Июл", "Авг", "Сен", "Окт", "Ноя", "Дек" ],
				"weekdays" : [ "Воскресенье","Понедельник","Вторник","Среда",
						"Четверг","Пятница","Суббота" ],
				"weekdaysShort" : [ "Вс","Пн","Вт","Ср",
						"Чт","Пт","Сб" ],
				"weekdaysMin" : [ "Вс","Пн","Вт","Ср",
						"Чт","Пт","Сб" ],
			}
		  } // перевод на русский язык
	});
});