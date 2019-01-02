<?php
/* @var $this \yii\web\View */
/* @var $generators \yii\gii\Generator[] */
/* @var $activeGenerator \yii\gii\Generator */
/* @var $content string */

use yii\helpers\Html;

$asset = yii\gii\GiiAsset::register($this);
$generators = Yii::$app->controller->module->generators;
$activeGenerator = Yii::$app->controller->generator;
?>

<?php $this->beginContent('@themes/gentelella/layouts/admin_default.php'); ?>

<div class="row">
	<div class="col-md-9 col-sm-8 col-xs-12">
		<?php if(Yii::$app->session->hasFlash('success'))
			echo $this->flashMessage(Yii::$app->session->getFlash('success'));
		else if(Yii::$app->session->hasFlash('error'))
			echo $this->flashMessage(Yii::$app->session->getFlash('error'), 'danger');

		echo $content; ?>
	</div>
	<div class="col-md-3 col-sm-4 col-xs-12">
		<div class="list-group">
			<?php
			foreach ($generators as $id => $generator) {
				$label = '<i class="glyphicon glyphicon-chevron-right"></i>' . Html::encode($generator->getName());
				echo Html::a($label, ['default/view', 'id' => $id], [
					'class' => $generator === $activeGenerator ? 'list-group-item active' : 'list-group-item',
				]);
			}
			?>
		</div>
	</div>
</div>

<?php $this->endContent(); ?>