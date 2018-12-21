<?php 
/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\widgets\Pjax;
use app\themes\gentelella\components\Sidebars;
use app\themes\gentelella\components\MenuTop;
use app\components\menu\MenuContent;
use app\components\menu\MenuOption;
use app\themes\gentelella\components\MenuFooter;
use app\components\Utility;
?>

<?php /* @var $this Controller */ ?>
<?php $this->beginContent('@themes/gentelella/layouts/default.php'); ?>

	<?php /* sidebar navigation */?>
	<?php echo Sidebars::widget();?>
	<?php /* end.sidebar navigation */?>

	<?php /* top navigation */?>
	<?php echo MenuTop::widget();?>
	<?php /* end.top navigation */?>

	<?php /* page content */?>
	<div class="right_col" role="main">
		<?php if (isset($this->title)): ?>
			<div class="page-title">
				<div class="title_left <?php echo $this->searchShow != true ? 'full-size' : '';?>">
					<h1><?php echo $this->title; ?><?php echo isset($this->description) ? '<small>'.$this->description.'</small>' : '';?></h1>
				</div>
				<?php if($this->searchShow == true): ?>
				<div class="title_right">
					<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search for...">
							<span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="clearfix"></div>

		<div class="row">
			<?php //Pjax::begin(); ?>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php if(Yii::$app->session->hasFlash('success'))
					echo $this->flashMessage(Yii::$app->session->getFlash('success'));
				else if(Yii::$app->session->hasFlash('error'))
					echo $this->flashMessage(Yii::$app->session->getFlash('error'), 'danger');?>

				<div class="x_panel">
					<div class="x_title">
						<?php echo !empty($this->params['menu']['content']) ? MenuContent::widget(['items' => $this->params['menu']['content']]) : '';?>
						<ul class="nav navbar-right panel_toolbox">
							<li><a href="#" title="<?php echo Yii::t('app', 'Toggle');?>" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
							<?php if(!empty($this->params['menu']['option'])):?>
							<li class="dropdown">
								<a href="#" title="<?php echo Yii::t('app', 'Options');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<?php echo MenuOption::widget(['items' => $this->params['menu']['option']]);?>
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
			</div>
			<?php //Pjax::end(); ?>
		</div>
	</div>
	<?php /* end.page content */?>

	<?php /* footer content */?>
	<?php echo MenuFooter::widget();?>
	<?php /* end.footer content */?>

<?php $this->endContent(); ?>