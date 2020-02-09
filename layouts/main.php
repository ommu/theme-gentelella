<?php 
/**
 * @var string $content
 * @var \yii\web\View $this
 */

?>

<?php /* @var $this Controller */ ?>
<?php $this->beginContent('@themes/gentelella/layouts/admin_default.php'); ?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo \app\components\widgets\Alert::widget(['closeButton'=>false]);
		
		if($this->cards == false)
			echo $content;

		else {?>
			<div class="x_panel">
				<div class="x_title">
					<?php echo !empty($this->params['menu']['content']) ? \app\components\widgets\MenuContent::widget(['items' => $this->params['menu']['content']]) : '';?>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="#" title="<?php echo Yii::t('app', 'Toggle');?>" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<?php if(!empty($this->params['menu']['option'])):?>
						<li class="dropdown">
							<a href="#" title="<?php echo Yii::t('app', 'Options');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<?php echo \app\components\widgets\MenuOption::widget(['items' => $this->params['menu']['option']]);?>
						</li>
						<?php endif;?>
						<li><a href="#" title="<?php echo Yii::t('app', 'Close');?>" class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<?php echo $content; ?>
				</div>
			</div>
		<?php }?>
	</div>
</div>

<?php $this->endContent(); ?>