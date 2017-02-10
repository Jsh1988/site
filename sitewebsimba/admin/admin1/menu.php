<?php defined("CATALOG") or die("Acces denied");?>
<!DOCTYPE html>
<html>
<head>
	<title>Админка</title>
	<meta http-equiv="content-type" content="text/html charset=utf-8" />

	<link rel="shortcut icon" href="<?=PATH?><?=VIEW?>img/ind/favicon.ico" />
	<link href="<?=PATH?><?=ADMIN?>css/admins.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="<?=PATH?><?=ADMIN?>ckeditor/ckeditor.js"></script>

	
</head>
<body>
<div class="a-block-body">
	<div class="a-block-categories">
		<p><a href="<?=PATH?>">Главная</a></p>
		<p><a href="<?=PATH?>administration">Админка</a></p>

		<?php foreach($acategories as $value):?>
			<p><a href="<?=PATH?><?=$value['alias']?>"><?=$value['title']?></a></p>
		<?php endforeach;?>
	</div>

	<div class="a-block-right">

		<?php if( isset($_GET['red_menu']) ):?>

		<form action="<?=PATH?>menu" method="post" class="form">
				<p><input type="hidden" name="id" value="<?=htmlspecialchars($getupdate['page_id'])?>"></p>
				<p class = "block-p">
					<label for="title">Заголовок:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($getupdate['title'])?>" name="title" id="title" />
				</p>
				<p class = "block-p">
					<label for="alias">Псевдоним:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($getupdate['alias'])?>" name="alias" id="alias" />
				</p>
				<p class = "block-p">
					<label for="description">Описание:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($getupdate['description'])?>" name="description" id="description" />
				</p>
				<p class = "block-p">
					<label for="keywords">Ключевые слова:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($getupdate['keywords'])?>" name="keywords" id="keywords" />
				</p>
				<p class = "block-p">
					<label for="content">Содержание:<span style="color:red;">*</span><label>
					<textarea class="set-block-input" name="content" id="content" ><?=htmlspecialchars($getupdate['content'])?></textarea>
				</p>
				<script type="text/javascript">
					CKEDITOR.replace("content");
				</script>
				<p class = "block-p">
					<label for="img">Картинка:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($getupdate['img'])?>" name="img" id="img" />
				</p>
				<p class = "block-p">
					<label for="position">Позиция:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($getupdate['position'])?>" name="position" id="position" />
				</p>
				
				
				<input type="submit" value="Редактировать" name="up_sub" class="sub" />
				
		</from>	

		<?php else:?>

		<?php if(isset($set_menu) AND $set_menu = 'set'):?>
			<form action="<?=PATH?>menu" method="post" class="form">
				<p class = "block-p">
					<label for="title">Заголовок:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="title" id="title" />
				</p>
				<p class = "block-p">
					<label for="alias">Псевдоним:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="alias" id="alias" />
				</p>
				<p class = "block-p">
					<label for="description">Описание:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="description" id="description" />
				</p>
				<p class = "block-p">
					<label for="keywords">Ключевые слова:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="keywords" id="keywords" />
				</p>
				<p class = "block-p">
					<label for="content">Содержание:<span style="color:red;">*</span><label>
					<textarea class="set-block-input" name="content" id="content" ></textarea>
				</p>
				<script type="text/javascript">
					CKEDITOR.replace("content");
				</script>
				<p class = "block-p">
					<label for="img">Картинка:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="img" id="img" />
				</p>
				<p class = "block-p">
					<label for="position">Позиция:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="position" id="position" />
				</p>
				
				<input type="submit" value="Добавить" name="sub" class="sub" />
				
			</from>	

		<?php else:?>
		
		<?php foreach($getmenu as $value):?>
			<div class="block-div" >
				<p class = "block-p"><?=$value['title']?></p>
				<p><a href="<?=PATH?>menu?del_menu=<?=$value['page_id']?> ">Удалить: <?=$value['title']?></a></p>
				<p><a href="<?=PATH?>menu?red_menu=<?=$value['page_id']?> ">Редактировать: <?=$value['title']?></a></p>
			</div>
		<?php endforeach;?>
		<div class="block-div" >
		<p><a href="<?=PATH?>menu?set_menu=set "><span style="color:red;">Добавить</span></a></p>
		</div>

		<?php endif;?>
		<?php endif;?>
		
	</div>

</div>

</body>
</html>