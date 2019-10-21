<?php
/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\helpers\Url;

$themeAsset = \themes\gentelella\assets\CustomAsset::register($this);

$this->beginPage();?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="<?php echo Yii::$app->charset ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="theme-color" content="#317EFB"/>
	<?php echo Html::csrfMetaTags() ?>
	<title><?php echo Html::encode($this->pageTitle) ?></title>
	<?php $this->head();
	$baseUrl = Yii::getAlias('@web');
$js = <<<JS
	const baseUrl = '{$baseUrl}';
	const themeAssetUrl = '{$themeAsset->baseUrl}';
	const version = '1';
if ('serviceWorker' in navigator) {
	window.addEventListener('load', function() {
		navigator.serviceWorker.register(baseUrl + '/service-worker.js?v='+version+'&bu='+baseUrl+'&tu='+themeAssetUrl);
	});
}
JS;
$this->registerJs($js, $this::POS_HEAD); ?>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="login" >
<?php $this->beginBody();
	list(, $themeCSS) = Yii::$app->assetManager->publish('@themes/gentelella/css');
	list(, $themeJS) = Yii::$app->assetManager->publish('@themes/gentelella/js');
	$this->registerCssFile($themeCSS . '/custom.css');
	//$this->registerJsFile(Url::base() . '/boApp.js');
?>
<?php /* body content */?>
<div>
	<a class="hiddenanchor" id="signup"></a>
	<a class="hiddenanchor" id="signin"></a>

	<div class="login_wrapper">
		<div class="animate form login_form">
			<section class="login_content">
				<?php echo $content ?>
			</section>
		</div>
	</div>
</div>
<?php /* end.body content */?>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
