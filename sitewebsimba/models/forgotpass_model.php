<?php 
defined("CATALOG") or die("Acces denied");

//начало восстановление пароля
function forgot(){
	global $connection;
	$email = trim(mysqli_real_escape_string($connection, $_POST['email']));
	if(empty($email)){
		$_SESSION['auth']['errors'] = 'Поле Email пустое';
	}else{

		$sql = "SELECT id FROM users WHERE email = '$email' LIMIT 1";
		$res = mysqli_query($connection,$sql);

		if(mysqli_num_rows($res) == 1){
			$expire = time() + 3600;
			$hash = md5($expire . $email);
			$sql = "INSERT INTO forgot(hash, expire, email) VALUES('$hash', $expire, '$email')";
			$res = mysqli_query($connection,$sql);

				//mysqli_affected_rows — Получает число строк, затронутых предыдущей операцией MySQL	
			if(mysqli_affected_rows($connection) > 0){
				//если добавлена запись в таблицу forgot
				$link = PATH . "forgotpass/?forgot={$hash}";
				$subject = "Восстановление пароля на сайте " . PATH;
				$body = "Перейдите по ссылке для восстановления пароля : <a href='{$link}'>Восстановление пароля</a> .  Ссылка активна 1 час!";
				/*$headers = "FROM: " . strtoupper($_SERVER['SERVER_NAME']) . "\r\n";
				$headers .= "Content-type:text/html; charset=utf-8";

				mail($email,$subject,$body,$headers);*/
				get_mail($email,$subject,$body);

				$_SESSION['auth']['ok'] = 'На ваш email выслана инструкция по восстановлению пароля.';

			}else{
				$_SESSION['auth']['errors'] = 'Ошибка не получилось на ваш email выслать инструкцию по восстановлению пароля.';
			}
		}else{
			$_SESSION['auth']['errors'] = 'Такого пользователя нет на сайте !!!';
		}
	}
};

//проверка пользователя на изменение пароля
function access_change(){
	global $connection;
	$hash = trim(mysqli_real_escape_string($connection,$_GET['forgot']));
	// если нет хеша
	if(empty($hash)){
		$_SESSION['forgot']['errors'] = 'Перейдите по коректной ссылке';
		return;
	}
	
	$sql = "SELECT id,hash,expire,email FROM forgot WHERE hash = '$hash' LIMIT 1";
	$res = mysqli_query($connection,$sql);
	//если не найден хеш
	if(!mysqli_num_rows($res)){
		$_SESSION['forgot']['errors'] = 'Ссылка устарела или вы перешли по некоректной ссылке.Пройдите процедуру восстановление пароля заново';
		return;
	}
	//текущее время
	$now = time();
	$row = mysqli_fetch_assoc($res);
	
	//если ссылка устарела
	if($row['expire'] - $now < 0){
	$_SESSION['forgot']['errors'] = 'Ссылка устарела. Пройдите процедуру восстановление пароля заново.';
	return;
	}
};

//смена пароля
function change_forgot_password(){
	global $connection;
	$password = strip_tags(trim($_POST['nov-password']));
	$password2 = strip_tags(trim($_POST['povtorenie-nov-password']));
	$hash = trim(mysqli_real_escape_string($connection,$_POST['hash']));

	if($password == '' OR $password2 == ''){
		$_SESSION['auth']['errors'] = 'Пустые поля';
		return;
	}
	if($password != $password2){
		$_SESSION['auth']['errors'] = 'Пароли не совпадают';
		return;
	}
	if(strlen($password) <= 5){
		$_SESSION['auth']['errors'] = 'Ваш пароль слишком маленький нужно водить не менее 6 символов ';
		return;
	}

	if(empty($password)){
		$_SESSION['auth']['errors'] = 'Не введен пароль';
		return;
	}
	
	$sql = "SELECT id,hash,expire,email FROM forgot WHERE hash = '$hash' LIMIT 1";
	$res = mysqli_query($connection,$sql);
	//если не найден хеш
	if(!mysqli_num_rows($res)) return;
	
	$now = time();
	$row = mysqli_fetch_assoc($res);
	
	//если ссылка устарела
	if($row['expire'] - $now < 0){
	mysqli_query($connection, "DELETE FROM forgot WHERE expire < $now");
	return;
	}
	
	$password = md5($password);
	$sql = "UPDATE users SET password = '$password' WHERE email = '{$row['email']}'";
	$res = mysqli_query($connection,$sql);
	mysqli_query($connection, "DELETE FROM forgot WHERE email = '{$row['email']}'");
	$_SESSION['forgot']['ok'] = "Вы успешно сменили пароль";
	
};

?>