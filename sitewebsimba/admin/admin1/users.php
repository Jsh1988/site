<?php defined("CATALOG") or die("Acces denied");?>
<?php include 'header.php';?>

	<div class="a-block-right">

		<?php if( isset($_GET['edit_us']) ):?>

	<form action="<?=PATH?>users" method="post" class="form">

		<p><input type="hidden" name="id" value="<?=htmlspecialchars($edit_us['id'])?>"></p>
		<p class = "block-p">
			<label for="admin">Заметка:<span style="color:red;">*</span><label>
			<input class="set-block-input" type="text" value="<?=htmlspecialchars($edit_us['is_admin'])?>" name="admin" id="admin" />
		</p>
				
				
		<input type="submit" value="Редактировать" name="edit" class="sub" />
				
	</from>

	<?php else:?>

	<?php foreach($getuser as $value):?>
			<div class="block-div" >
				<p class = "block-p"><span style="color:red;">Логин:</span> <?=$value['login']?></p>
				<p class = "block-p"><span style="color:red;">EMail:</span> <?=$value['email']?></p>
				<p class = "block-p"><span style="color:red;">Имя:</span> <?=$value['firstname']?></p>
				<p class = "block-p"><span style="color:red;">Фамилия:</span> <?=$value['surname']?></p>
				<p class = "block-p"><span style="color:red;">Телефон:</span> <?=$value['phone']?></p>
				<p class = "block-p"><span style="color:red;">Страна:</span> <?=$value['country']?></p>
				<p class = "block-p"><span style="color:red;">Регион:</span> <?=$value['region']?></p>
				<p class = "block-p"><span style="color:red;">Город:</span> <?=$value['city']?></p>
				<p class = "block-p"><span style="color:red;">Почтовый индекс:</span> <?=$value['indexs']?></p>
				<p class = "block-p"><span style="color:red;">Улица:</span> <?=$value['street']?></p>
				<p class = "block-p"><span style="color:red;">Дом:</span> <?=$value['house']?></p>
				<p class = "block-p"><span style="color:red;">Заметка:</span> <?=$value['is_admin']?></p>
			
				<p><a href="<?=PATH?>users?delete_us=<?=$value['id']?> ">Удалить: <?=$value['login']?></a></p>
				<p><a href="<?=PATH?>users?edit_us=<?=$value['id']?> ">Редактировать: <?=$value['login']?></a></p>
			</div>
		<?php endforeach;?>

		<?php if($count_pages > 1):?>
				<ul class="pagination">
					<li><?=$pagenation?></li>
				</ul>
				<?php endif;?>
						
		<?php endif;?>
	</div>


</div>
</body>
</html>