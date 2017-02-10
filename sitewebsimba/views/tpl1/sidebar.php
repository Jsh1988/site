<?php defined("CATALOG") or die("Acces denied");?>
		<div id="block_left">

			<div id="block_avtorizaciya">

				<?php if(!isset($_SESSION['auth']['firstname'])):?>

			<form action="<?=PATH?>authorization" method="post">
				<ul id="block_log_pass">
					<h3>Войти</h3>
					<li><center><input class="formas" type="text" name="log" id="auth_log" placeholder="Логин" /></center></li>
					<li><center><input class="formas" type="password" name="pass" id="auth_pass" placeholder="Пароль" /></center></li>
					<li><input id="sub" name="auth_sub" type="submit" value="Войти"></li>
					<li><input id="remember" type="checkbox" name="remember"/><span class="check">Запомнить меня?</span></li>
					<li><a href="<?=PATH?>registration">Регистрация</a><a id="forgotpass-link" href="#">Забыли пароль</a></li>
				</ul>
			</form>

			<?php else:?>

			<div class= "hello" >
				<p> Добро пожаловать: <em> <b> <?=htmlspecialchars($_SESSION['auth']['firstname'])?> </b> </em> </p>
				<?php if($_SESSION['auth']['is_admin'] == 1):?>
					<p class = "exit"><a href = "<?=PATH?>administration">Админка</a></p>
					<p class = "exit"><a href = "<?=PATH?>exit">Выход</a></p>
				<?php else:?>
					<p class = "exit"><a href = "<?=PATH?>exit">Выход</a></p>
				<?php endif;?>

			</div>

			<?php endif;?>

			</div>

			<!--восстановление пароля-->
    		<div id="forgotpass">
        		<form action="<?=PATH?>forgotpass" method="post">
           	 		<ul class="ul-forgotpass">
           	 			<h3>Восстановить пароль</h3>
               			<li><input type="text" name="email" id="email" class="formas" placeholder="Введите ваш email"></li>
                		<li><input class="vislat_pass" type="submit" value="Выслать пароль" name="forgotpass"></li>
            		</ul>
        		</form>
        		<p class = "forgot_exit" ><a id="authorization-link" href="#">Вход на сайт</a></p>
    		</div>

			<?php if(isset($_SESSION['auth']['errors'])):?>
			<div class="error"><?=$_SESSION['auth']['errors']?></div>
				<?php unset($_SESSION['auth']);?>
				 <?php endif;?>

				<?php if(isset($_SESSION['auth']['ok'])):?>
			<div class="ok"><?=$_SESSION['auth']['ok']?></div>
				<?php unset($_SESSION['auth']);?>
				<?php endif;?>

			<div id="block_category">
				<p class="header_title">Категории</p>
				<ul id="accordion">
					<?php echo $menu_categories;?>
				</ul>
			</div>
			<!-- /// -->
			<div class='clr'></div>
			
			<!-- /// -->
			<div class="block_eventCalendar">
				<link href="<?=PATH?><?=VIEW?>css/eventCalendar/eventCalendar.css" rel="stylesheet" type="text/css" />
				<link href="<?=PATH?><?=VIEW?>css/eventCalendar/eventCalendar_theme_responsive.css" rel="stylesheet" type="text/css" />
				<script type="text/javascript">
					var data = <?php echo $events; ?>; 
				</script>
				<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/eventCalendar/moment.js"></script>
				<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/eventCalendar/jquery.eventCalendar.js"></script>
				<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/eventCalendar/script.eventCalendar.js"></script>
				<div class="eventCalendar"></div>
			</div>
		</div>