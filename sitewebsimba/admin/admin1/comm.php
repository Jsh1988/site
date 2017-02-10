<?php defined("CATALOG") or die("Acces denied");?>
<?php include 'header.php';?>

	<div class="a-block-right">

		<?php if( isset($_GET['edit_com']) ):?>

		<form action="<?=PATH?>comm" method="post" class="form">

				<p><input type="hidden" name="id" value="<?=htmlspecialchars($edit_com['id'])?>"></p>
				<p class = "block-p">
					<label for="approved">Утвержденный:<span style="color:red;">*</span><label>
					<input class="set-block-input" type="text" value="<?=htmlspecialchars($edit_com['approved'])?>" name="approved" id="approved" />
				</p>
								
				<input type="submit" value="Редактировать" name="edit" class="sub" />
				
			</from>


		<?php else:?>

	<?php foreach($getCom as $value):?>
			<div class="block-div" >
				<p class = "block-p"><span style="color:red;">Заголовок продукта в котором комментарий:</span><?=$value['title']?></p>
				<p class = "block-p"><span style="color:red;">Имя:</span> <?=$value['firstname']?></p>
				<p class = "block-p"><span style="color:red;">Фамилия:</span> <?=$value['surname']?></p>
				<p class = "block-p"><span style="color:red;">Комментарий:</span> <?=$value['content']?></p>
				<p class = "block-p"><span style="color:red;">Дата и Время:</span> <?=$value['date']?></p>
				<p class = "block-p"><span style="color:red;">Утверждение:</span> <?=$value['approved']?></p>

				<p><a href="<?=PATH?>comm?delete_com=<?=$value['comid']?> ">Удалить: <?=$value['firstname']?></a></p>
				<p><a href="<?=PATH?>comm?edit_com=<?=$value['comid']?> ">Редактировать: <?=$value['firstname']?></a></p>
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