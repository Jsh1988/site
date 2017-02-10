<?php defined("CATALOG") or die("Acces denied");?>
<?php include 'header.php';?>

	<div class="a-block-right">
		
		<?php foreach($getip as $value):?>
			<p class = "block-p"><?=$value['ip_adress']?></p>
			<p><a href="<?=PATH?>administration?id_ip=<?=$value['id']?> ">Удалить: <?=$value['ip_adress']?></a></p>
		<?php endforeach;?>
		<hr />
		<?php foreach($getvisits as $value):?>
			<div class="block-div" >
			<p class = "block-p">Дата когда пользователи заходили на сайт :<span style="color:red;"><?=$value['date']?></span></p>
			<p class = "block-p">Сколько людей заходили на сайт :<span style="color:red;"><?=$value['hosts']?></span></p>
			<p class = "block-p">Сколько кликов сделали пользователи на сайте :<span style="color:red;"><?=$value['views']?></span></p>
			<p><a href="<?=PATH?>administration?id_vis=<?=$value['id']?> ">Удалить: <?=$value['date']?></a></p>
			</div>
		<?php endforeach;?>
	</div>

</div>

</body>
</html>