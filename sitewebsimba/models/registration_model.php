<?php
defined("CATALOG") or die("Acces denied");

/*массив стран*/
function countrys(){
	$countries = array("", "Украина", "Россия", "Австралия", "Австрия", "Азербайджан", "Албания", "Алжир", "Американское Самоа", "Ангилья (Брит.)", "Ангола", "Андорра", "Антигуа и Барбуда", "Аргентина", "Армения", "Аруба (Нид.)", "Афганистан", "Багамы", "Бангладеш", "Барбадос", "Бахрейн", "Беларусь", "Белиз", "Бельгия", "Бенин", "Бермуды (Брит.)", "Болгария", "Боливия", "Босния и Герцеговина", "Ботсвана", "Бразилия", "Британская территория в Индийском океане", "Бруней-Даруссалам", "Буркина-Фасо", "Бурунди", "Бутан", "Вануату", "Ватикан", "Великобритания", "Венгрия", "Венесуэла", "Виргинские острова (Брит.)", "Виргинские острова (США)", "Вьетнам", "Габон", "Гаити", "Гайана", "Гамбия", "Гана", "Гваделупа (Фр.)", "Гватемала", "Гвинея", "Гвинея-Бисау", "Германия", "Гернси (Брит.)", "Гибралтар (Брит.)", "Гондурас", "Гренада", "Гренландия (Дат.)", "Греция", "Грузия", "Гуам (США)", "Дания", "Джерси (Брит.)", "Джибути", "Доминика", "Доминиканская Республика", "Египет", "Замбия", "Зап. Сахара", "Зимбабве", "Израиль", "Индия", "Индонезия", "Иордания", "Ирак", "Иран", "Ирландия", "Исландия", "Испания", "Италия", "Йемен", "Кабо-Верде", "Казахстан", "Камбоджа", "Камерун", "Канада", "Катар", "Кения", "Кипр", "Киргизия (Кыргызстан)", "Кирибати", "Китай", "Кокосовые острова (Австр.)", "Колумбия", "Коморы", "Конго (Заир)", "Конго, Республика", "Корея (КНДР)", "Корея, Республика", "Коста-Рика", "Кот-д`Ивуар", "Куба", "Кувейт", "Лаос", "Латвия", "Лесото", "Либерия", "Ливан", "Ливия", "Литва", "Лихтенштейн", "Люксембург", "Маврикий", "Мавритания", "Мадагаскар", "Майотт (Фр.)", "Македония", "Малави", "Малайзия", "Мали", "Мальдивы", "Мальта", "Марокко", "Мартиника (Фр.)", "Маршалловы Острова", "Мексика", "Микронезия (Федеративные Штаты Микронезии)", "Мозамбик", "Молдавия", "Монако", "Монголия", "Монтсеррат (Брит)", "Мьянма", "Намибия", "Науру", "Непал", "Нигер", "Нигерия", "Нидерландские Антилы", "Нидерланды", "Никарагуа", "Ниуэ (Н.Зел.)", "Новая Зеландия", "Новая Каледония (Фр.)", "Норвегия", "Объединенные Арабские Эмираты", "Оман", "Остров Буве (Норв.)", "Остров Кайман (Брит.)", "Остров Мэн (Брит.)", "Остров Рождества (Австр.)", "Острова Кука (Н.Зел.)", "Острова Теркс и Кайкос (Брит.)", "Острова Херд и Макдональд (Австр.)", "Пакистан", "Палау", "Палестина", "Панама", "Папуа - Новая Гвинея", "Парагвай", "Перу", "Питкерн (Брит.)", "Польша", "Португалия", "Реюньон (Фр.)", "Руанда", "Румыния", "США", "Сальвадор", "Самоа", "Сан-Марино", "Сан-Томе и Принсипи", "Саудовская Аравия", "Свазиленд", "Святая Елена (Брит.)", "Сев. Марианские острова (США)", "Сейшелы", "Сенегал", "Сент-Винсент и Гренадины", "Сент-Китс и Невис", "Сент-Люсия", "Сент-Пьер и Микелон (Фр.)", "Сербия", "Сингапур", "Сирия", "Словакия", "Словения", "Соломоновы Острова", "Сомали", "Судан", "Суринам", "Сьерра-Леоне", "Таджикистан", "Таиланд", "Тайвань", "Танзания", "Тимор", "Того", "Токелау (Н.Зел.)", "Тонга", "Тринидат и Тобаго", "Тувалу", "Тунис", "Туркмения", "Турция", "Уганда", "Узбекистан", "Уоллис и Футуна острова (Фр.)", "Уругвай", "Фарерские о-ва (Дания)", "Фиджи", "Филиппины", "Финляндия", "Фолклендские острова (Брит.)", "Франция", "Французская Гвиана", "Французская Полинезия", "Французские Южные территории", "Хорватия", "Центральноафриканская Республика", "Чад", "Черногория", "Чехия", "Чили", "Швейцария", "Швеция", "Шпицберген (Норв.)", "Шри Ланка", "Эквадор", "Экваториальная Гвинея", "Эритрея", "Эстония", "Эфиопия", "Юж. Джорджия и Юж. Сандвичевы о-ва (Брит.)", "Южно-Африканская Республика (ЮАР)", "Ямайка", "Япония");

return $countries; 
};
/*массив стран*/

//проверка доступности поля
function access_field(){
	global $connection;
	$fields = array('login', 'email');
	$val = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['val'])));
	$field = $_POST['dataField'];
	
	if(!in_array($field,$fields)){
		$res = array('reg' => 'no');
		return json_encode($res);
	}

	if($field == 'email' AND !empty($val)){
		if(!preg_match("#^[\w\._-]+@[\w\.-]+\.[\w]{2,3}$#i", $val)){
			$res = array('reg' => 'no');
			return json_encode($res);
		}
	}
	
	$sql = "SELECT id FROM users WHERE $field = '$val'";
	$res = mysqli_query($connection,$sql);
	
	if(mysqli_num_rows($res) > 0){
		$res = array('reg' => 'no');
		return json_encode($res);
	}else{
		$res = array('reg' => 'yes');
		return json_encode($res);
	}
};

//опсание функции регестрации
function registration(){
	global $connection;
	$errors = '';
	$fields = array('login' => 'Логин', 'email' => 'Email');

	$login = strip_tags(trim($_POST['registration_login']));//$_SESSION['reg']['login']
	$password = strip_tags(trim($_POST['registration_pass']));
	$firstname= strip_tags(trim($_POST['registration_firstname']));//$_SESSION['reg']['name']
	$surname = strip_tags(trim($_POST['registration_surname']));//$_SESSION['reg']['name']
	$email = strip_tags(trim($_POST['registration_email']));//$_SESSION['reg']['email']
	$countryss = strip_tags(trim($_POST['registration_country']));
	$post = array($login,$email);


	
	if(empty($login)) $errors .= '<li>Не указан Логин</li>';
	if(empty($password)) $errors .= '<li>Не указан Пароль</li>';
	if(empty($firstname)) $errors .= '<li>Не указано Имя</li>';
	if(empty($surname)) $errors .= '<li>Не указана Фамилия</li>';
	if(empty($email)) $errors .= '<li>Не указан Еmail</li>';
	if(!empty($email)){
		/*preg_match -- Выполняет проверку на соответствие регулярному выражению*/
		if(!preg_match("#^[\w\._-]+@[\w\.-]+\.[\w]{2,3}$#i", $email)){
			$errors .= '<li>Не прошел на валидацию Email</li>';
		}
	}
	if($countryss == "") $errors .= '<li>Не указана Страна</li>';
	
	if(!empty($errors)){
		// не заполнены обязательные поля
		$_SESSION['auth']['errors'] = "Вы не заполнили обязательные поля: <ul>{$errors}</ul>";
		return;
	}
	
	$login = mysqli_real_escape_string($connection, $login);
	$password = md5($password);
	$firstname = mysqli_real_escape_string($connection, $firstname);// O\'Railly
	$surname = mysqli_real_escape_string($connection, $surname);// O\'Railly
	$email = mysqli_real_escape_string($connection, $email);
	$countryss = mysqli_real_escape_string($connection, $countryss);

	//проверка дублирования данных
	$sql = "SELECT login, email FROM users WHERE login = '$login' OR email = '$email'";
	$res = mysqli_query($connection,$sql);
	if(mysqli_num_rows($res) > 0){
		$data = array();
		while($row = mysqli_fetch_assoc($res)){
			// берём то, что совпадает с содержимым $_POST, т,е. дубликаты
			$data = array_intersect($row, $post);/*array_intersect -- Вычислить схождение массивов*/
			foreach($data as $key => $value){
				$similarity[$key] = $key;
			}
			
		}
			//print_arr($k);
			foreach($similarity as $key => $val){
				$errors .= "<li>{$fields[$key]}</li>";
			}
			$_SESSION['auth']['errors'] = "Выберите другие значения для полей: <ul>{$errors}</ul>";
		return;
	}
	
	$sql = "INSERT INTO users (login,password,email,firstname,surname,country) VALUES ('$login','$password','$email','$firstname','$surname','$countryss')"; $res = mysqli_query($connection,$sql);

	/*mysqli_affected_rows = Получает количество задействованных рядов в предыдущей операции MySQL*/
	if(mysqli_affected_rows($connection) == 1){
		$_SESSION['auth']['ok'] = "Регестрация прошла успешно. Теперь вы можете зайти под своими данными ";
		$_SESSION['auth']['user'] = stripcslashes($firstname);// Удаляет экранирование символов
		$_SESSION['auth']['is_admin'] = 0;
	}else{
		$_SESSION['auth']['errors'] = "Ошибка регистрации";
	}	
};

?>