<?php
namespace themes\gentelella\components;

use app\models\CoreLanguages;
use yii\helpers\ArrayHelper;

class MenuFooter extends \yii\base\Widget
{
	public function run() {
        
        $coreLang = CoreLanguages::find()
            ->select(['code', 'name'])
            ->where(['actived'=> 1])
            ->all();
        $language = ArrayHelper::map($coreLang, 'code', 'name');

		return $this->render('menu_footer', [
            'language' => $language,
        ]);
	}
}