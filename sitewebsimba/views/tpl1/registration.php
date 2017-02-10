<?php defined("CATALOG") or die("Acces denied");?>
 <!DOCTYPE html>
<html>
<head>
	<title>Регистрация на websimba.dp.ua</title>
	<meta http-equiv="content-type" content="text/html charset=utf-8" />
	<meta name="description" content="Регистрация на websimba.dp.ua" />
	<meta name="keywords" content="Регистрация на websimba.dp.ua" />

	<link rel="shortcut icon" href="<?=PATH?><?=VIEW?>img/ind/qicon.ico" />
	<link href="<?=PATH?><?=VIEW?>css/styles.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/search.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/pb.css" rel="stylesheet" type="text/css" />
	<link href="<?=PATH?><?=VIEW?>css/humanity/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css" />

<script>
var path = "<?=PATH?>";
</script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/jquery.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/jquery.accordion.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/script.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/registration.js"></script>
<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/search.js"></script>

</head>
<body>
	<div id="block_body">

		<div id="block_header">

			<div class="logo">
				<h1><a href="<?=PATH?>">WebSimba.<span>dp.ua</span></a></h1>
				<p>Интересные статьи</p>
			</div>

			<div class = "block_search">

			<form action="<?=PATH?>search" method="get">
				<ul class="search">
					 <li>
						<input type="text" id="autocomplete" class="search" name="search" />
					 </li>
					 <li>
						<input type="submit" class="search-go" name="go-search" value="поиск"  />
					</li>
				</ul>
			</form>

			</div>

		</div>

		<div id="block_menu">
			<ul>
				<?php foreach($pages as $key => $link):?>

					<?php if($link == 'Главная'): ?>

						<li><a href="<?=PATH?>"><?=$link?></a></li>

					<?php else: ?>

						<li><a href="<?php echo PATH . 'page/' . $key;?>"><?=$link?></a></li>

					<?php endif;?>

					<?php endforeach;?>
			</ul>
		</div>

 <?php include 'sidebar.php';?>

		<div id="block_right">
			<div class="block_content">

				<ul class="breadcrumbs">
					<?=$breadcrumbs?>
				</ul>

				<div class="product">
					<div class="block_registration">
						<div class="reg-h2"><h2>Регистрация</h2></div>
						<?php if( isset( $_SESSION['auth']['errors'] ) ): ?>

								<div class="error"><?=$_SESSION['auth']['errors']?></div>

						<?php elseif( isset( $_SESSION['auth']['ok'] ) ): ?>

								<div class="ok"><?=$_SESSION['auth']['ok']?></div>
								<?php unset($_SESSION['auth']['string']); ?>

						<?php elseif(!isset($_SESSION['auth']['user'])): ?>

						<form action="<?=PATH?>registration" method="post" class="form">
							<p>
								<label for="registration_firstname">Имя:<span style="color:red;">*</span><label>
								<input class="reg-input" type="text" name="registration_firstname" id="registration_firstname" />
							</p>

							<p>
								<label for="registration_surname">Фамилия:<span style="color:red;">*</span><label>
								<input class="reg-input" type="text" name="registration_surname" id="registration_surname" />
							</p>

							<p>
								<label for="registration_login">Логин:<span style="color:red;">*</span><label>
								<input class="reg-input access " data-field="login" type="text" name="registration_login" id="registration_login" /><span></span>
							</p>

							<p>
								<label for="registration_pass">Пароль:<span style="color:red;">*</span><label>
								<input class="reg-input" type="password" name="registration_pass" id="registration_pass" />
							</p>
							<p>
								<label for="registration_passw">Повторите Пароль:<span style="color:red;">*</span><label>
								<input class="reg-input" type="password" name="registration_passw" id="registration_passw" />
							</p>

							<p>
								<label for="registration_email">Email:<span style="color:red;">*</span><label>
								<input class="reg-input access " data-field="email" type="text" name="registration_email" id="registration_email" /><span></span>
							</p>
							<p>
								<lable for="registration_country">Страна:<span style="color:red;">*</span></lable>
								<select class="reg-input" name="registration_country" id="registration_country">
									<?php foreach($countrys as $country): ?>
									<option value="<?=htmlspecialchars($country)?>"><?=$country?></option>
									<?php endforeach; ?>
								</select>
							</p>
							<p>
								<label for="registration_captcha"><img src="<?=PATH?><?=VIEW?>img/captcha.php" alt="captcha"><label>
								<input class="reg-input access " type="text" name="registration_captcha" id="registration_captcha" />
							</p>
							<p>
								<input class="reg-check" type="checkbox" name="registration_checkbox" id="registration_checkbox" />
								<label class="reg-checkbox"  for="registration_checkbox">Для проверки что вы не робот!!!<span style="color:red;">*</span><label>
							</p>
							<p>
								<input type="submit" value="Зарегистрироваться" name="registration_sub" class="reg-sub" />
							</p>

						</form>
						<?php endif;?>
						<?php unset($_SESSION['auth']); ?>

					</div>
				</div>
				<div class="clr"></div>

			</div>
		</div>

		<div id="block_footer">
			
				<ul>
					<li align="center">&copy; websimba.dp.ua, <?=date('Y')?>
						<p>интересные статьи</p>
					</li>
				</ul>

		</div>



	</div>