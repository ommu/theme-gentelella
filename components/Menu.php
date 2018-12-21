<?php
namespace themes\gentelella\components;

/**
 * Menu class
 *
 * Klas turunan dari klas menu gentelella dengan ditambahkan penangan javascript void pada menu yg mengandung #
 *
 * @author    Agus Susilo<smartgdi@gmail.com>
 * @copyright Copyright (c) 2016 ECC UGM
 */

use Yii;
use rmrevin\yii\fontawesome\component\Icon;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

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
                '{icon}' => isset($item['icon'])
                    ? new Icon($item['icon'], ArrayHelper::getValue($item, 'iconOptions', []))
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