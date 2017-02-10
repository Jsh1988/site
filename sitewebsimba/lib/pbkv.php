<?php
defined("CATALOG") or die("Acces denied");

/* курс валют RUR EUR USD 
function courses($curr = 'USD'){
	$data = file_get_contents(LINK);
	if(!$data) return false;
	$courses = json_decode($data,true);

	$course_ccy = false;
	$course_base_ccy = false;
	$course_buy = false;
	$course_sale = false;
	$arr = array();
	foreach ($courses as $course) {
	if($course['ccy'] == $curr){
		$course_ccy = $course['ccy'];//Код валюты
		$course_base_ccy = $course['base_ccy'];//Код национальной валюты
		$course_buy = (float)$course['buy'];//Курс покупки
		$course_sale = (float)$course['sale'];//Курс продажи
		break;
	}
}
	return $arr = array('code' => $course_ccy, 'purchase' => $course_buy, 'sale' => $course_sale);
};
/* курс валют 

$usd = courses();
$eur = courses('EUR');
$rur = courses('RUR');

//html разметка курса валют
<!--<div class='block_pb'>
				<p class="header_title">Курс валют ПриватБанк</p>
				<div class='clr'></div>
				<div class='block_popr'>
					<p class='pb_po'>Покупка</p> <p class='pb_pr'>Продажа</p><div class='clr'></div>
					<p class='pb_code'><?= // $usd['code']; ?></p>
					<p class= 'pb_purchase'><?=//$usd['purchase']?></p>
					<p class= 'pb_sale'><?=//$usd['sale']?></p>
					<div class='clr'></div>

					<p class='pb_code'><?=//$eur['code']?></p>
					<p class= 'pb_purchase'><?=//$eur['purchase']?></p>
					<p class= 'pb_sale'><?=//$eur['sale']?></p>
					<div class='clr'></div>

					<p class='pb_code'><?=//$rur['code']?></p>
					<p class= 'pb_purchase'><?=//$rur['purchase']?></p>
					<p class= 'pb_sale'><?=//$rur['sale']?></p>
					<div class='clr'></div>
				</div>

</div>

// картинки в футере html разметка
<link href="<?=PATH?><?=VIEW?>css/slider/jquery.bxslider.css" rel="stylesheet" type="text/css" />
				<link href="<?=PATH?><?=VIEW?>css/slider/slider.css" rel="stylesheet" type="text/css" />
			
				<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/slider/jquery.bxslider.js"></script>
				<script type="text/javascript" src="<?=PATH?><?=VIEW?>js/slider/bxslider.js"></script>
			
			<?php if(isset($bxslider)):?>
			<div class="slider">
				<ul class="bxslider">
					<?php foreach($bxslider as $slider):?>
					<li><a href="<?=$slider['url']?>"><img src="<?=PATH?><?=VIEW?>/img/img1/<?=$slider['images']?>" title="<?=$slider['title']?>"/></a></li>
					<?php endforeach;?>
				</ul>
			</div>
				<?php endif;?>

*/

?>