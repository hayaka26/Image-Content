<?php
defined('C5_EXECUTE') or die("Access Denied.");
$al = Loader::helper('concrete/asset_library');
$bf = null;

if ($controller->getFileID() > 0) { 
	$bf = $controller->getFileObject();
}
 ?>
<?php
$args = array();
?>
 
<div class="form-group">
	<?php echo $form->label('title', '見出し');?>
	<?php echo $form->text('title', $title); ?>
</div>
<div class="form-group">
	<?php echo $form->label('content', '本文');?>
	<?php
		$editor = Core::make('editor');
		echo $editor->outputBlockEditModeEditor('content', $content);
	?>
</div>
<div class="form-group">
	<?php echo $form->label('ccm-b-image', '画像');?>
	<?php echo $al->image('ccm-b-image', 'fID', t('Choose Image'), $bf, $args);?>
</div>
<div class="form-group">
	<?php echo $form->label('align', '画像の位置');?>
	<?php echo $form->select('align', array('left' => '左側', 'right' => '右側'), $align); ?>
</div>
<div class="form-group">
	<?php echo $form->label('imagesize', '画像のサイズ');?>
	<?php echo $form->select('imagesize', array('XL' => '特大', 'L' => '大', 'M' => '中', 'S' => '小'), $imagesize); ?>
</div>