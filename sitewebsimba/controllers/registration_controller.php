<?php
defined("CATALOG") or die("Acces denied");
include 'main_controller.php';
include "models/{$view}_model.php";

$countrys = countrys();

if(isset($_POST['val'])){
	echo access_field();
	exit;
}

if(isset($_POST['registration_sub'])){
	if(isset($_POST['registration_checkbox']) && $_POST['registration_checkbox'] == 'on'){
		if(isset($_POST['registration_passw']) && $_POST['registration_pass'] == $_POST['registration_passw']){
			if( strlen($_POST['registration_pass']) >= 6 ){

				if(!isset($_SESSION['auth']['string'])){
					$_SESSION['auth']['string'] = "error";
					redirect();
					}

				if(isset($_POST['registration_captcha']) && $_POST['registration_captcha'] == $_SESSION['auth']['string'] ){
					registration();					
					redirect();
				}else{
					$_SESSION['auth']['errors'] = "Не верный код с картинки!";
					redirect();
				}
				
			}else{
				$_SESSION['auth']['errors'] = "Ваш пароль слишком маленький нужно водить не менее 6 символов";
				redirect();
			}
			
		}else{
			$_SESSION['auth']['errors'] = "Ваши пароли не совпадают";
			redirect();	
		}
	
	}else{
		$_SESSION['auth']['errors'] = "Вы не поставили галочку";
		redirect();	
	}
}

$breadcrumbs = "<li><a href='".PATH."'>Главная</a></li> / <li>Регестрация</li>";
include VIEW . "{$view}.php";

?>