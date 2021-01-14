<?php 
/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo \app\components\widgets\Alert::widget(['closeButton'=>false]); ?>

		<div class="x_panel p-0">
			<div class="x_content p-0">
                <?php //begin.Wizard ?>
                <div class="wizard wizard-2" data-wizard-state="step-first" data-wizard-clickable="false">
                    <?php //begin.Wizard Nav ?>
                    <div class="wizard-nav border-right py-8 px-8 py-lg-12 px-lg-12">
                        <?php //begin.Wizard Step Nav ?>
                        <div class="wizard-steps">
                            <?php $i = 0;
                            foreach ($navigation as $key => $val) {
                                $i++ ?>
                                <div class="wizard-step" data-wizard-type="step" <?php echo $val['id'] == $current ? 'data-wizard-state="current"' : '';?>>
                                    <div class="wizard-wrapper">
                                        <?php if ($val['icon']) {?>
                                        <div class="wizard-icon">
                                            <span class="svg-icon svg-icon-2x">
                                                <?php //begin.Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/User.svg ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <?php //end.Svg Icon ?>
                                            </span>
                                        </div>
                                        <?php }?>

                                        <div class="wizard-label">
                                            <h3 class="wizard-title"><?php echo $val['title']; ?></h3>
                                            <?php if ($val['desc']) {?>
                                                <div class="wizard-desc"><?php echo $val['desc']; ?></div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                            <?php //end.Wizard Step Nav ?>
                        </div>
                    </div>
                    <?php //end.Wizard Nav ?>

                    <?php //begin.Wizard Body ?>
                    <div class="wizard-body py-8 px-8 py-lg-12 px-lg-12">
                        <?php echo $content; ?>
                    </div>
                    <?php //end.Wizard Body ?>
                </div>
                <?php //end.Wizard ?>
			</div>
		</div>
	</div>
</div>