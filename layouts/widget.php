<?php 
/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\helpers\Url;
use app\components\widgets\Alert;
use app\components\widgets\MenuContent;
use app\components\widgets\MenuOption;
?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo Alert::widget(['closeButton'=>false]); ?>

		<div class="x_panel">
			<div class="x_title">
				<?php if($contentMenu && $this->params['menu']['content'])
					echo MenuContent::widget(['items' => $this->params['menu']['content']]);?>

				<ul class="nav navbar-right panel_toolbox">
					<li><a href="#" title="<?php echo Yii::t('app', 'Toggle');?>" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					<?php if($contentMenu && $this->params['menu']['option']) {?>
					<li class="dropdown">
						<a href="#" title="<?php echo Yii::t('app', 'Options');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<?php echo MenuOption::widget(['items' => $this->params['menu']['option']]);?>
					</li>
					<?php }?>
					<li><a href="#" title="<?php echo Yii::t('app', 'Close');?>" class="close-link"><i class="fa fa-close"></i></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
</div>