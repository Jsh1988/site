<?php defined("CATALOG") or die("Acces denied");?>
<?php include 'header.php';?>

	<div class="a-block-right">
		<?php if(isset($get_dir) ):?>

		<form action="<?=PATH?>gallery" method="post"  class="form">

				<p><input type="hidden" name="path" value="<?=htmlspecialchars($get_dir['path'])?>"></p>
				<p class = "block-p">
					<label for="name">Имя файла:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="name" id="name" />
				</p>
				<input type="submit" value="Удаление файла" name="del_f" class="sub" />

		</form>
		<?php foreach($get_dir['img'] as $value):?>
				<?php if(($value != '.') AND ($value != '..')):?>
					<div class="block-div" >
						<p class = "block-p"><span style="color:red;">Имя картинки:</span> <?=$value?></p>	
					</div>
				<?php endif;?>
		<?php endforeach;?>

		<?php else:?>

		<?php if(isset($addition_foto) AND $addition_foto = 'foto'):?>

			<form action="<?=PATH?>gallery" method="post"  class="form">

				<p class = "block-p">
					<lable for="folder">Папка с картинками:<span style="color:red;">*</span></lable>
					<select class="set-block-input" name="folder" id="folder">
						
						<option value="img1/">CATALOGIMG</option>
						<option value="menuimg/">MENUIMG</option>
						
					</select>
				</p>
				<input type="submit" value="Директория" name="di_fil" class="sub" />

			</form>
		
			<form action="<?=PATH?>gallery" method="post" enctype="multipart/form-data" class="form">
				<p class = "block-p">
					<lable for="folder">Папка с картинками:<span style="color:red;">*</span></lable>
					<select class="set-block-input" name="folder" id="folder">
						
						<option value="img1/">CATALOGIMG</option>
						<option value="menuimg/">MENUIMG</option>
						
					</select>
				</p>
				<p class = "block-p">
					<label for="foto">Картинка:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="file" name="foto" id="foto" />
				</p>
				<input type="submit" value="Загрузить картинку" name="Upload_picture" class="sub" />
			</form>

		<?php else:?>

		<?php if( isset($_GET['edit_gal']) ):?>

		<form action="<?=PATH?>gallery" method="post" class="form">

				<p><input type="hidden" name="id" value="<?=htmlspecialchars($edit_gal['id_photo'])?>"></p>
				<p class = "block-p">
					<label for="title">Заголовок:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($edit_gal['title'])?>" name="title" id="title" />
				</p>
				<p class = "block-p">
					<label for="photo">Картинка:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($edit_gal['photo'])?>" name="photo" id="photo" />
				</p>
				<p class = "block-p">
					<label for="parent">Родитель:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($edit_gal['parent'])?>" name="parent" id="parent" />
				</p>
				<p class = "block-p">
					<label for="photo_description">Описание:<span style="color:red;">*</span><label>
					<textarea class="set-block-input" name="photo_description" id="photo_description" ><?=htmlspecialchars($edit_gal['photo_description'])?></textarea>
				</p>
				<p class = "block-p">
					<label for="link">Ссылка на видео с ютуба:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($edit_gal['link'])?>" name="link" id="link" />
				</p>
				<p class = "block-p">
					<label for="mark">Картинка или видео:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($edit_gal['mark'])?>" name="mark" id="mark" />
				</p>
				
				
				<input type="submit" value="Редактировать" name="edit" class="sub" />
				
			</from>


		<?php else:?>

		<?php if(isset($addition_gal) AND $addition_gal = 'set'):?>

			<form action="<?=PATH?>gallery" method="post" class="form">
				<p class = "block-p">
					<label for="title">Заголовок:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="title" id="title" />
				</p>
				<p class = "block-p">
					<label for="photo">Картинка:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="photo" id="photo" />
				</p>
				<p class = "block-p">
					<label for="parent">Родитель:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="parent" id="parent" />
				</p>
				<p class = "block-p">
					<label for="photo_description">Описание:<span style="color:red;">*</span><label>
					<textarea class="set-block-input" name="photo_description" id="photo_description" ></textarea>
				</p>
				<p class = "block-p">
					<label for="link">Ссылка на видео с ютуба:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="link" id="link" />
				</p>
				<p class = "block-p">
					<label for="mark">Картинка или видео:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" name="mark" id="mark" />
				</p>
				
				
				<input type="submit" value="Добавить" name="addition" class="sub" />
				
			</from>

		<?php else:?>

	<?php foreach($gallery as $value):?>
			<div class="block-div" >
				<p class = "block-p"><span style="color:red;">Заголовок:</span> <?=$value['title']?></p>
				<p class = "block-p"><span style="color:red;">Картинка:</span> <?=$value['photo']?></p>
				<p class = "block-p"><span style="color:red;">Описание:</span> <?=$value['photo_description']?></p>
				<p><a href="<?=PATH?>gallery?delete_gal=<?=$value['id_photo']?> ">Удалить: <?=$value['title']?></a></p>
				<p><a href="<?=PATH?>gallery?edit_gal=<?=$value['id_photo']?> ">Редактировать: <?=$value['title']?></a></p>
			</div>
		<?php endforeach;?>
				
		<div class="block-div" >
		<p><a href="<?=PATH?>gallery?addition_gal=set "><span style="color:red;">Добавить</span></a></p>
		<p><a href="<?=PATH?>gallery?addition_foto=foto "><span style="color:red;">Добавить картинку</span></a></p>
		</div>

		<?php endif;?>
		<?php endif;?>
		<?php endif;?>
		<?php endif;?>

	</div>


</div>
</body>
</html>