<?php defined("CATALOG") or die("Acces denied");

//авторизация
function authorization(){
	global $connection;
	$login = trim(mysqli_real_escape_string($connection,$_POST['log']));
	$password = trim($_POST['pass']);

	if( empty($login) OR empty($password) ){
		$_SESSION['auth']['errors'] = 'Поля логин или пароль пустые!';
		redirect();
	}else{
		$password = md5($password);
		$sql = "SELECT firstname, surname, is_admin FROM users WHERE login = '$login' AND password = '$password' LIMIT 1";
		$res = mysqli_query($connection,$sql);

		if(mysqli_num_rows($res) == 1){
			$row = mysqli_fetch_assoc($res);
			
			$_SESSION['auth']['firstname'] = $row['firstname'];
			$_SESSION['auth']['surname'] = $row['surname'];
			$_SESSION['auth']['is_admin'] = $row['is_admin'];

			//если нужно запомнить
			if(isset($_POST['remember']) && $_POST['remember'] == 'on'){
				$hash = md5(time() . $login);
				setcookie('ex', $hash, time()+60*60*24*7);
				$sql = "UPDATE users SET remember = '$hash' WHERE login = '$login' ";
				mysqli_query($connection,$sql);
			}//если нужно запомнить */
			
		}else{
			$_SESSION['auth']['errors'] = 'Логин/Пароль введены неверно' ;
			redirect();
		}
	}

};
?>