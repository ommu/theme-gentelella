<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace themes\gentelella\components\grid;

/**
 * GridView for Backoffice Themes
 *
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)811-2540-432
 * @copyright Copyright (c) 2017 OMMU (www.ommu.id)
 * @created date 2 September 2017, 15:42 WIB
 * @modified date 2 May 2019 2019, 17.05 WIB
 * @link https://github.com/ommu/theme-gentelella
 */
class GridView extends \yiister\gentelella\widgets\grid\GridView
{
	/**
	 * {@inheritdoc}
	 */
	public $layout = '<div class="dataTable">{items}</div><div class="row"><div class="col-sm-5">{summary}</div><div class="col-sm-7">{pager}</div></div>';

	/**
	 * {@inheritdoc}
	 */
	public function run()
	{
		parent::run();

		if($this->view->theme->name != 'gentelella') {
			unset($this->view->assetBundles['yiister\gentelella\assets\ThemeBuildAsset']);
			unset($this->view->assetBundles['yiister\gentelella\widgets\grid\GridViewAsset']);
		}
	}
}
