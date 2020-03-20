<?php
/**
 * Menu class
 * Klas turunan dari klas menu gentelella dengan ditambahkan penangan javascript void pada menu yg mengandung #
 *
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 OMMU (www.ommu.id)
 * @created date 2 January 2018, 23:08 WIB
 * @link https://github.com/ommu/theme-gentelella
 * 
 */

namespace themes\gentelella\components;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use rmrevin\yii\fontawesome\component\Icon;

class Menu extends \yiister\gentelella\widgets\Menu
{
	/**
	 * @inheritdoc
	 */
	protected function renderItem($item)
	{
		$renderedItem = '';
		if (isset($item['url'])) {
			$template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);

			$url = Html::encode(Url::to($item['url']));
			// Jika key url isinya '#' maka replace href menjadi javascript void.
			if( (!is_array($item['url']) && substr($item['url'], -1) == '#') || 
				(is_array($item['url']) && ($item['url'][0] == '/#' || $item['url'][0] == '#')) ) {
				$url = 'javascript:void(0);';
			}

			$renderedItem = strtr($template, [
				'{url}' => $url,
				'{label}' => $item['label'],
			]);

		} else {
			$template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);

			$renderedItem = strtr($template, [
				'{label}' => $item['label'],
			]);
		}

		if (isset($item['badge'])) {
			$badgeOptions = ArrayHelper::getValue($item, 'badgeOptions', []);
			Html::addCssClass($badgeOptions, 'label pull-right');
		} else {
			$badgeOptions = null;
		}
		return strtr(
			$renderedItem,
			[
				'{icon}' => isset($item['icon']) && $item['icon']
					? new Icon(substr($item['icon'], 3), ArrayHelper::getValue($item, 'iconOptions', []))
					: '',
				'{badge}' => (
					isset($item['badge'])
						? Html::tag('small', $item['badge'], $badgeOptions)
						: ''
					) . (
					isset($item['items']) && count($item['items']) > 0
						? (new Icon('chevron-down'))->tag('span')
						: ''
					),
			]
		);
	}
}