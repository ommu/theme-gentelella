<?php 
/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
?>

<?php if($modalHeader) {?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<h4 class="modal-title"><?php echo Html::encode($this->title) ?></h4>
</div>
<?php }?>

<div class="modal-body">
	<?php echo $content; ?>
</div>