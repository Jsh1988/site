jQuery(document).ready(function($){
	$("#lightGallery").lightGallery({
		mode: 'fade',//анимация
		speed: 500,//скорость показа анимации
		addClass: 'myClass', //класс большой картинки
		preload: 1, //сколько изображений загружено
		/*selector: 'li',*///определяет дочерний элемент галереи 
		thumbnail: true, //определяет нужно ли показывать кнопку миниатюр
		showThumbByDefault: false,//показывать ли миниатюры сразу
		thumbWidth: 100,//ширина миниатюр
		thumbMargin: 5,//отступ между изображениями
		loop: true,//циклический показ изображений
		auto: true, //включает слайдшоу
		pause: 5000, //пауза повторений слайдов
		escKey: false,//отключает кнопку esc
		closable: false,//отключает экран выключения гаререи
		counter: true //счётчик изображений

	});
});