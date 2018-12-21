<?php
/* @var $this \yii\web\View */
/* @var $generators \yii\gii\Generator[] */
/* @var $activeGenerator \yii\gii\Generator */
/* @var $content string */

use yii\helpers\Html;

$controller = $this->context;
$menus = $controller->module->menus;
$route = $controller->route;
foreach ($menus as $i => $menu) {
	$menus[$i]['active'] = strpos($route, trim($menu['url'][0], '/')) === 0;
}
$this->params['nav-items'] = $menus;
?>

<?php $this->beginContent('@themes/gentelella/layouts/main.php'); ?>
<div class="row">
	<div class="col-md-9 col-sm-8">
		<?php echo $content ?>
	</div>
	<div class="col-md-3 col-sm-4">
		<div class="list-group">
			<?php
			foreach ($menus as $menu) {
				$label = Html::tag('i', '', ['class' => 'glyphicon glyphicon-chevron-right pull-right']) .
					Html::tag('span', Html::encode($menu['label']), []);
				$active = $menu['active'] ? ' active' : '';
				echo Html::a($label, $menu['url'], [
					'class' => 'list-group-item' . $active,
				]);
			}
			?>
		</div>
	</div>
</div>

<?php
list(, $url) = Yii::$app->assetManager->publish('@mdm/admin/assets');
$this->registerCssFile($url . '/list-item.css');
?>

<?php $this->endContent(); ?>
