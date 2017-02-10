<?php defined("CATALOG") or die("Acces denied");?>
<?php include 'header.php';?>

 <?php include 'sidebar.php';?>

		<div id="block_right">
			<div class="block_content">

				<ul class="breadcrumbs">
					<?=$breadcrumbs?>
				</ul>

				<div class="product">
					<div class="block_forgot_pass">
						<h2>Восстановления пароля</h2>

						<!--Пароль изменён-->
							<?php if(isset($_SESSION['forgot']['ok'])):?>
							<div class="ok"><?=$_SESSION['forgot']['ok']?></div>
							<?php unset($_SESSION['forgot']);?>
							
							<!--ошибки доступа на изменение пароля-->
							<?php elseif(isset($_SESSION['forgot']['errors'])):?>
							<div class="error"><?=$_SESSION['forgot']['errors']?></div>
							<?php unset($_SESSION['forgot']['errors']);?>

							<!--только зашли-->
							<?php else:?>
						
						<form action="<?=PATH?>forgotpass" method="post" class="form">
							<p>
								<label class="label-nov-pass" for="nov-password">Новый пароль:<span style="color:red;">*</span><label>
								<input class="reg-input" type="password" name="nov-password" id="nov-password" />
							</p>
							<p><input type="hidden" name="hash" value="<?=htmlspecialchars($_GET['forgot'])?>"></p>
							<p>
								<label class="label-nov-pass" for="povtorenie-nov-password">Повторить новый пароль:<span style="color:red;">*</span><label>
								<input class="reg-input" type="password" name="povtorenie-nov-password" id="povtorenie-nov-password" />
							</p>
							<p>
								<input type="submit" value="Отправить новый пароль" name="change_password" class="reg-sub" />
							</p>
						</form>

							<?php endif;?>


					</div>
				</div>

				<div class="clr"></div>
			</div>
		</div>

 <?php include 'footer.php';?>