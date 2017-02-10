<?php defined("CATALOG") or die("Acces denied");?>
<?php include 'header.php';?>


	<div class="a-block-right">

		<?php if( isset($_GET['red_c']) ):?>

		<form action="<?=PATH?>cat" method="post" class="form">
				<p><input type="hidden" name="id" value="<?=htmlspecialchars($getupdate['id'])?>"></p>
				<p class = "block-p">
					<label for="title">Заголовок:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($getupdate['title'])?>" name="title" id="title" />
				</p>
				<p class = "block-p">
					<label for="alias">Псевдоним:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($getupdate['alias'])?>" name="alias" id="alias" />
				</p>
				<p class = "block-p">
					<label for="parent">Родительский ID:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($getupdate['parent'])?>" name="parent" id="parent" />
				</p>
				
				<input type="submit" value="Редактировать" name="up_sub" class="sub" />
				
		</from>	

		<?php else:?>

		<?php if(isset($set_c) AND $set_c = 'set'):?>
			<form action="<?=PATH?>cat" method="post" class="form">
				<p class = "block-p">
					<label for="title">Заголовок:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="title" id="title" />
				</p>
				<p class = "block-p">
					<label for="alias">Псевдоним:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="alias" id="alias" />
				</p>
				<p class = "block-p">
					<label for="parent">Родительский ID:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="parent" id="parent" />
				</p>
				
				<input type="submit" value="Добавить" name="sub" class="sub" />
				
			</from>			
		<?php else:?>

			<?php foreach($getcat as $value):?>
			<div class="block-div" >
				<p class = "block-p"><?=$value['title']?></p>
				<p><a href="<?=PATH?>cat?del_c=<?=$value['id']?> ">Удалить: <?=$value['title']?></a></p>
				<p><a href="<?=PATH?>cat?red_c=<?=$value['id']?> ">Редактировать: <?=$value['title']?></a></p>
			</div>
		<?php endforeach;?>
		<div class="block-div" >
		<p><a href="<?=PATH?>cat?set_c=set "><span style="color:red;">Добавить</span></a></p>
		</div>

		<?php endif;?>
		<?php endif;?>
		

	</div>


</div>
</body>
</html>