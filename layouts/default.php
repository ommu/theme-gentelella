<?php
/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use themes\gentelella\components\Sidebars;
use themes\gentelella\components\MenuTop;
use themes\gentelella\components\MenuFooter;

\themes\gentelella\assets\EventEmitterAsset::register($this);
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
<body class="nav-<?php echo !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >

	<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					loading...
				</div>
			</div>
		</div>
	</div>

    <div class="modal fade" id="modalBroadcast" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                loading...
            </div>
        </div>
    </div>

	<?php $this->beginBody();?>
	<div class="container body">
		<div class="main_container">
			<?php if(!($this->context->action instanceof \yii\web\ErrorAction)) {
				// begin.sidebar navigation 
				echo Sidebars::widget();
				
				// begin.top navigation
				echo MenuTop::widget();
			}
			
			//begin.content
			echo $content;
			
			if(!($this->context->action instanceof \yii\web\ErrorAction)) {
				//begin.footer content
				echo MenuFooter::widget();
			}?>
		</div>
	</div>

	<div id="custom_notifications" class="custom-notifications dsp_none">
		<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group"></ul>
		<div class="clearfix"></div>
		<div id="notif-group" class="tabbed_notifications"></div>
	</div>
	<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
