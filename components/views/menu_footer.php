<?php 
use yii\helpers\Html;
use yii\helpers\Url;

$js = <<<JS
    $(document).on('change', 'form.selectLang', function() {
        var url = $(this).attr('action');
		var options = {
			type: 'POST',
			data: $(this).serialize(),
			success: function(response, textStatus, jqXHR) {
				location.href = url;
			},
			complete: function(jqXHR, textStatus) {
				var redirect = jqXHR.getResponseHeader('X-Redirect');
				if(redirect != null) {
					location.href = redirect;
                }
			}
		}
        $.ajax(url, options);
    });
JS;
$this->registerJs($js, $this::POS_END);

/* footer content */?>
<footer class="d-flex flex-md-row flex-column">
	<div class="flex-fill order-md-1 order-0 text-md-right text-center">
		Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com" rel="nofollow" target="_blank">Colorlib</a> |
		Extension for Yii framework 2 by <a href="http://yiister.ru" rel="nofollow" target="_blank">Yiister</a>
	</div>
	<div class="order-md-0 order-1 text-md-left text-center mt-md-0 mt-5">
        <?php 
        echo Html::beginForm(Yii::$app->request->url, 'POST', ['class' => 'selectLang']);
        echo Html::dropDownList('lang', Yii::$app->language, $language, ['class' => 'form-control']);
        echo Html::endForm(); ?>
	</div>
</footer>
<?php /* end.footer content */?>