<?php 
defined("CATALOG") or die("Acces denied");

function get_mail($email,$subject,$body,$headers = 'WebSimba'){

	$mail = new PHPMailer;

	$mail->isSMTP();

	$mail->Host = 'smtp.websimba.dp.ua.';
	$mail->SMTPAuth = true;
	$mail->Username = 'eugene@websimba.dp.ua'; // логин от вашей почты
	$mail->Password = 'SoQLkXJj9HxG'; // пароль от почтового ящика
	$mail->SMTPSecure = 'ssl';
	$mail->Port = '465';

	$mail->CharSet = 'UTF-8';
	$mail->From = 'eugene@websimba.dp.ua';
	$mail->FromName = $headers;
	$mail->addAddress($email, $headers);
	/*$mail->addCC('www@ww.ua','Евгений');*/

	$mail->isHTML(true);

	$mail->Subject = $subject;
	$mail->Body = $body;

	/*$mail->AltBody = "";*/
	/*$mail->SMTPDebug = 1;*/
	/*$mail->ErrorInfo;*/
	$mail->send();
};

?>