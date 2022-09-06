<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\modules\rbac\components\MenuHelper;
use themes\gentelella\components\SidebarMenu;
use themes\gentelella\components\SidebarSetting;
use app\modules\user\models\Users;

$displayname = '';
$photos = join('/', [Users::getUploadPath(false), 'default.png']);
if (!Yii::$app->user->isGuest) {
    $displayname = Yii::$app->user->identity->displayname;
    $photos = Yii::$app->user->identity->photos;
}

?>
<?php /* sidebar navigation */?>
<div class="col-md-3 left_col">
	<div class="left_col scroll-view">

		<div class="navbar nav_title" style="border: 0;">
			<a href="<?php echo Url::to(['/site/index']);?>" class="site_title"><i class="fa fa-paw"></i> <span><?= Yii::$app->name ?></span></a>
		</div>
		<div class="clearfix"></div>

		<?php /* menu prile quick info */?>
		<div class="profile clearfix">
			<div class="profile_pic">
				<img src="<?php echo Url::to(join('/', ['@webpublic', $photos]));?>" alt="<?php echo $displayname; ?>" class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Welcome,</span>
				<h2><?php echo $displayname; ?></h2>
			</div>
		</div>
		<?php /* end.menu prile quick info */?>

		<br />

		<?php /* sidebar menu */?>
		<?php $menuItems = [];
		$menuItems = ArrayHelper::merge(
			$menuItems,
			MenuHelper::getAssignedMenu(Yii::$app->user->id)
		);?>
		<?php echo SidebarMenu::widget(['menuItems' => $menuItems]);?>
		<?php /* end.sidebar menu */?>

		<?php /* menu footer buttons */?>
		<?php echo SidebarSetting::widget();?>
		<?php /* end.menu footer buttons */?>
	</div>
</div>
<?php /* end.sidebar navigation */?>