<?php 
/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\widgets\Pjax;
use app\components\widgets\MenuContent;
use app\components\widgets\MenuOption;
use app\components\Utility;
use themes\gentelella\components\Sidebars;
use themes\gentelella\components\MenuTop;
use themes\gentelella\components\MenuFooter;
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
	</div>
	<?php echo $content; ?>

</div>
<?php /* end.page content */?>

<?php /* footer content */?>
<?php echo MenuFooter::widget();?>
<?php /* end.footer content */?>

<?php $this->endContent(); ?>