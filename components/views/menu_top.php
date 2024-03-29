<?php 
/* top navigation */

use yii\helpers\Url;
use app\modules\user\models\Users;

$displayname = '';
$photos = join('/', [Users::getUploadPath(false), 'default.png']);
if (!Yii::$app->user->isGuest) {
    $displayname = Yii::$app->user->identity->displayname;
    $photos = Yii::$app->user->identity->photos;
}
?>

<div class="top_nav">
	<div class="nav_menu">
		<nav class="" role="navigation">
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<img src="<?php echo Url::to(join('/', ['@webpublic', $photos]));?>" alt=""><?php echo $displayname;?>
						<span class=" fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu pull-right">
						<!-- <li><a href="javascript:;">Profile</a></li>
						<li><a href="<?php echo Url::to(['/admin/setting/index']); ?>"><span>Settings</span></a></li>
						<li><a href="javascript:;">Help</a></li> -->
						<li><a href="<?php echo Url::to(['/site/logout']);?>"><i class="fa fa-sign-out pull-right"></i> <?php echo Yii::t('app', 'Log Out');?></a></li>
					</ul>
				</li>
				<li role="presentation" class="dropdown">
					<!-- <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-envelope-o"></i>
						<span class="badge bg-green">6</span>
					</a> -->
					<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
						<li>
							<a>
								<span class="image"><img src="http://placehold.it/128x128" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where...
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image">
									<img src="http://placehold.it/128x128" alt="Profile Image" />
								</span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where...
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image">
									<img src="http://placehold.it/128x128" alt="Profile Image" />
								</span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where...
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image">
									<img src="http://placehold.it/128x128" alt="Profile Image" />
								</span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where...
								</span>
							</a>
						</li>
						<li>
							<div class="text-center">
								<a href="/"><strong>See All Alerts</strong><i class="fa fa-angle-right"></i></a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
<?php /* end.top navigation */?>