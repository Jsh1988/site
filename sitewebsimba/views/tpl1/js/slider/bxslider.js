$(document).ready(function($){
	$('.bxslider').bxSlider({
				mode: 'fade', // вид переключения
				adaptiveHeight: false, // для авто размера картинки
				captions: false,//для текста
				speed: 10000,// время переключение картинок
				auto: true,// авто переключение
  				autoControls: false,// кнопки старт и стоп
  				//infiniteLoop: true, //что бы изчезла кнопка в начале
  				//hideControlOnEnd: true //что бы изчезла кнопка в конце
			});
});