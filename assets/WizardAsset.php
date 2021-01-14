<?php
namespace themes\gentelella\assets;

class WizardAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@themes/gentelella';
	
	public $css = [
		"css/flaticon-min.css",
		"css/flaticon2-min.css",
		"css/wizard/wizard-1-min.css",
		"css/wizard/wizard-2-min.css",
		"css/wizard/wizard-3-min.css",
		"css/wizard/wizard-4-min.css",
		"css/wizard/wizard-5-min.css",
		"css/wizard/wizard-6-min.css",
	];

	public $depends = [
		'themes\gentelella\assets\CustomAsset',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG? true: false,
		'except' => [
			'assets/',
			'components/',
			'layouts/',
			'module/',
			'site/',
		],
	];

}