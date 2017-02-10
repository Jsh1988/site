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

		<?php if( isset($_GET['edit_pro']) ):?>

		<form action="<?=PATH?>article" method="post" class="form">

				<p><input type="hidden" name="id" value="<?=htmlspecialchars($edit_pro['id'])?>"></p>
				<p class = "block-p">
					<label for="title">Заголовок:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="title" value="<?=htmlspecialchars($edit_pro['title'])?>" id="title" />
				</p>
				<p class = "block-p">
					<label for="alias">Псевдоним:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="alias" value="<?=htmlspecialchars($edit_pro['alias'])?>" id="alias" />
				</p>
				<p class = "block-p">
					<label for="parent">Родитель:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="parent" value="<?=htmlspecialchars($edit_pro['parent'])?>" id="parent" />
				</p>
				<p class = "block-p">
					<label for="discription">Описание:<span style="color:red;">*</span><label>
					<textarea class="set-block-input" name="discription" id="discription" ><?=$edit_pro['discription']?></textarea>
				</p>
				<script type="text/javascript">
					CKEDITOR.replace("discription");
				</script>
				<p class = "block-p">
					<label for="content">Содержание:<span style="color:red;">*</span><label>
					<textarea class="set-block-input" name="content" id="content" ><?=$edit_pro['content']?></textarea>
				</p>
				<script type="text/javascript">
					CKEDITOR.replace("content");
				</script>
				<p class = "block-p">
					<label for="img">Картинка:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="img" value="<?=htmlspecialchars($edit_pro['img'])?>" id="img" />
				</p>
				<p class = "block-p">
					<label for="price">Цена:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="price" value="<?=htmlspecialchars($edit_pro['price'])?>" id="price" />
				</p>
				<p class = "block-p">
					<label for="descriptions">Описание мини:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="descriptions" value="<?=htmlspecialchars($edit_pro['descriptions'])?>" id="descriptions" />
				</p>
				<p class = "block-p">
					<label for="keywords">Ключевые слова:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="keywords" value="<?=htmlspecialchars($edit_pro['keywords'])?>" id="keywords" />
				</p>
				<p class = "block-p">
					<label for="views">Взгляды:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="views" value="<?=htmlspecialchars($edit_pro['views'])?>" id="views" />
				</p>

				<input type="submit" value="Редактировать" name="edit" class="sub" />
				
			</from>


		<?php else:?>

		<?php if(isset($addition_pro) AND $addition_pro = 'set'):?>

			<form action="<?=PATH?>article" method="post" class="form">
				<p class = "block-p">
					<label for="title">Заголовок:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="title" id="title" />
				</p>
				<p class = "block-p">
					<label for="alias">Псевдоним:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="alias" id="alias" />
				</p>
				<p class = "block-p">
					<label for="parent">Родитель:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="parent" id="parent" />
				</p>
				<p class = "block-p">
					<label for="discription">Описание:<span style="color:red;">*</span><label>
					<textarea class="set-block-input" name="discription" id="discription" ></textarea>
				</p>
				<script type="text/javascript">
					CKEDITOR.replace("discription");
				</script>
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
					<label for="price">Цена:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="price" id="price" />
				</p>
				<p class = "block-p">
					<label for="descriptions">Описание мини:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="descriptions" id="descriptions" />
				</p>
				<p class = "block-p">
					<label for="keywords">Ключевые слова:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="keywords" id="keywords" />
				</p>

				<input type="submit" value="Добавить" name="addition" class="sub" />
				
			</from>

		<?php else:?>

	<?php foreach($pro_article as $value):?>
			<div class="block-div" >
				<p class = "block-p"><?=$value['title']?></p>
				<p><a href="<?=PATH?>article?delete_pro=<?=$value['id']?> ">Удалить: <?=$value['title']?></a></p>
				<p><a href="<?=PATH?>article?edit_pro=<?=$value['id']?> ">Редактировать: <?=$value['title']?></a></p>
			</div>
		<?php endforeach;?>

				<?php if($count_pages > 1):?>
				<ul class="pagination">
					<li><?=$pagenation?></li>
				</ul>
				<?php endif;?>
				
		<div class="block-div" >
		<p><a href="<?=PATH?>article?addition_pro=set "><span style="color:red;">Добавить</span></a></p>
		</div>

		<?php endif;?>
		<?php endif;?>	

	</div>


</div>
</body>
</html>