<?php defined("CATALOG") or die("Acces denied");?>

<li><a href="<?=PATH?>category/<?=$category['alias']?>"><?=$category['title']?></a>
	<?php if(isset($category['childs']) && $category['childs']): ?>
	<ul class="cat_section">
		<?php echo categories_to_string($category['childs']);?>
	</ul>
	<?php endif; ?>
</li>