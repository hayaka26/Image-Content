<?php
	defined('C5_EXECUTE') or die("Access Denied.");
	$c = Page::getCurrentPage();
	?>
<?php 
switch ($imagesize) {
	case 'XL':
		$col_image = 7;
		$col_content = 5;
		break;
	case 'L':
		$col_image = 6;
		$col_content = 6;
		break;
	case 'M':
		$col_image = 5;
		$col_content = 7;
		break;
	case 'S':
		$col_image = 4;
		$col_content = 8;
		break;
}
if($align == "left"){
	$col_content_tag .= $col_content." col-sm-push-".$col_image;
	$col_image_tag .= $col_image." col-sm-pull-".$col_content;
}else{
	$col_content_tag = $col_content;
	$col_image_tag = $col_image;
}
 ?>

		<div class="image-content-block">
			<div class="row">
				<div class="col-sm-<?php echo h($col_content_tag); ?> content">
						<?php if($title) echo '<h4>'.h($title).'</h4>'; ?>
					<?php if (!$content && is_object($c) && $c->isEditMode()) { ?>
						<div class="ccm-edit-mode-disabled-item"><?php echo "本文は未入力です" ?></div> 
					<?php } else {?>
						<?php print $content;?>
					<?php } ?>
				</div>
				<div class="col-sm-<?php echo h($col_image_tag); ?> image">
					<?php 
					if (is_object($f)) {
						$image = Core::make('html/image', array($f));
						$tag = $image->getTag();
						$tag->addClass('img-responsive bID-'.$bID);
						if ($title) {
							$tag->title(h($title));
						}
						print $tag;
					}
					?>
				</div>
			</div>
		</div>