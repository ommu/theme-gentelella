<?php
/* @var $this \yii\web\View */
/* @var $generators \yii\gii\Generator[] */
/* @var $activeGenerator \yii\gii\Generator */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\components\widgets\MenuContent;
use app\components\widgets\MenuOption;

$controller = $this->context;
$menus = $controller->subMenu;
$route = $controller->route;

$firstKeyMenu = array_key_first($menus);
if (array_key_exists('label', $menus[$firstKeyMenu]) || array_key_exists('url', $menus[$firstKeyMenu])) {
    $menus = [0 => $menus];
}

foreach ($menus as $i => $group) {
    foreach ($group as $j => $menu) {
        foreach ($menu['url'] as $key => $val) {
            $part = explode('*', $val);
            if(strpos($part[0], '$_GET') !== false) {
                $menus[$i][$j]['url'][$key] = $controller->subMenuParam ? $controller->subMenuParam : Yii::$app->request->get($part[1]);
            }
        }
        if(isset($menu['select'])) {
            if($menu['select'] == 'controller') {
                $menus[$i][$j]['active'] = strtolower($controller->id) == trim($menu['url'][0], '/') || preg_match('/^('.addcslashes(strtolower($controller->id), '/').')/', trim($menu['url'][0], '/'));
                // $menus[$i][$j]['active'] = strtolower($controller->id) == str_replace('/'.$controller->action->id, '', trim($menu['url'][0], '/'));
            } else if($menu['select'] == 'action') {
                $menus[$i][$j]['active'] = strtolower($controller->id.'/'.$controller->action->id) == trim($menu['url'][0], '/');
            } else if($menu['select'] == 'url') {
                $menus[$i][$j]['active'] = Url::current() == Url::to($menus[$i][$j]['url']);
            }
        } else
            $menus[$i][$j]['active'] = strpos($route, trim($menu['url'][0], '/')) === 0;
    }
} ?>

<?php $this->beginContent('@themes/gentelella/layouts/admin_default.php'); ?>

<div class="row">
    <div class="col-md-2 col-sm-3 col-xs-12">
        <?php foreach ($menus as $group) {?>
        <div class="list-group">
            <?php 
            foreach ($group as $menu) {
                $label = Html::tag('i', '', ['class' => 'glyphicon glyphicon-chevron-right pull-right']) .
                    Html::tag('span', Html::encode($menu['label']), []);
                $active = $menu['active'] ? ' active' : '';
                $htmlOptions = ['class' => 'list-group-item' . $active];
                if(isset($menu['htmlOptions']))
                    $htmlOptions = \yii\helpers\ArrayHelper::merge($htmlOptions, $menu['htmlOptions']);
                echo Html::a($label, $menu['url'], $htmlOptions);
            } ?>
        </div>
        <?php }?>
    </div>

	<div class="col-md-10 col-sm-9 col-xs-12">
		<?php echo \app\components\widgets\Alert::widget(['closeButton'=>false]);
		
		if($this->cards == false)
			echo $content;

		else {?>
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
		<?php }?>
	</div>
</div>

<?php $this->endContent(); ?>
