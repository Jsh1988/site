<?php
	session_start();
	header("Content-Type: image/png;");

	$img = imagecreatetruecolor(80, 30);//imagecreatetruecolor — Создание нового полноцветного изображения

	$red = imagecolorallocate($img, 255, 0, 0);//imagecolorallocate — Создание цвета для изображения
	$green = imagecolorallocate($img, 0, 139, 0);
	$blue = imagecolorallocate($img, 0, 0, 139);
	$w = imagecolorallocate($img, 169, 169, 169);

	function randomString($length){
		$char = "abcdefghijklmnopqrstuvwxyz1234567890";
		srand((double)microtime()*1000000);//srand — Изменяет начальное число генератора псевдослучайных чисел
		$str = "";
		$i = 0;
		while ($i <= $length) {
			$num = rand() % 33;//rand — Генерирует случайное число
			$tmp = substr($char, $num, 1);//substr — Возвращает подстроку
			$str = $str . $tmp;
			$i++;
		}
		return $str;
	}

	for ($i=1; $i <= rand(1,2); $i++) { 
		$color = (rand(1,2) == 1) ? $green : $blue;
		imageline($img, rand(5,30), rand(35,20), rand(5,30)+5, rand(5,20)+5, $color);//imageline — Рисование линии
		imageline($img, rand(5,70), rand(5,10), rand(5,70)+5, rand(5,10)+5, $color);
	}

	imagefill($img, 1, 1, $w);//imagefill — Заливка
	
	$string = randomString(rand(3,4));
	$_SESSION['auth']['string'] = $string;

	
	imagestring($img, 5, 20, 5, $string, $red);//imagestring — Рисование строки текста горизонтально
	imagepng($img);//imagepng — Вывод PNG изображения в броузер или файл
	imagedestroy($img);//imagedestroy — Уничтожение изображения
?>