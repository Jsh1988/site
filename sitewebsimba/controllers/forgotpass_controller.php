<?php
defined("CATALOG") or die("Acces denied");
include 'main_controller.php';
include "models/{$view}_model.php";
include 'lib/mail.php';

if(isset($_SESSION['auth']['firstname'])) redirect(PATH);

//если запрошено восстановление пароля
if(isset($_POST['forgotpass'])){
	 forgot();
	redirect();
	
}

// если есть ссылка на восстановление пароля
elseif(isset($_GET['forgot'])){
	access_change();
	$breadcrumbs = "<li><a href='".PATH."'>Главная</a></li> - <li>Восстановление пароля</li>";
	include VIEW . "{$view}.php";
}

// новый пароль
elseif(isset($_POST['change_password'])){
	change_forgot_password();
	redirect(PATH . "forgotpass/?forgot=" . $_POST['hash']);	
}

else{
	redirect(PATH);
}

?>