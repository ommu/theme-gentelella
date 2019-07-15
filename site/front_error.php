<?php
/**
 * @var $this yii\web\View
 * @var $name string
 * @var $message string
 * @var $exception Exception
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 OMMU (www.ommu.co)
 * @created date 3 January 2018, 16:02 WIB
 * @link https://github.com/ommu/theme-gentelella
 *
 */

use yii\helpers\Html;
use ommu\report\models\ReportSetting;
use ommu\report\models\Reports;

$this->title = $name;

$textColor = $exception->statusCode === 404 ? "text-yellow" : "text-red";
$url = Yii::$app->request->absoluteUrl;
$message = $name.' '.nl2br(Html::encode($message));

$model = ReportSetting::find()
	->select(['auto_report_cat_id'])
	->where(['id'=>1])
	->one();

if($model->auto_report_i)
	Reports::insertReport($url, $message);
?>

<h1 class="error-number <?= $textColor;?>"><?= $exception->statusCode ?></h1>
<h2><?= nl2br(Html::encode($exception->getName())) ?></h2>
<p><?= nl2br(Html::encode($message)) ?></p>
<?php echo Html::a(Yii::t('app', 'Report this?'), ['/report/site/add', 'url'=>$url, 'message'=>$message], ['class'=>'modal-btn']);?>