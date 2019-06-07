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

$this->title = $name;

$textColor = $exception->statusCode === 404 ? "text-yellow" : "text-red";
?>

<h1 class="error-number <?= $textColor;?>"><?= $exception->statusCode ?></h1>
<h2><?= nl2br(Html::encode($exception->getName())) ?></h2>
<p><?= nl2br(Html::encode($message)) ?></p>
<?php echo Html::a(Yii::t('app', 'Report this?'), ['/report/site/add', 'url'=>Yii::$app->request->absoluteUrl, 'message'=>$name.' '.nl2br(Html::encode($message))], ['class'=>'modal-btn']);?>