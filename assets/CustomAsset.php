<?php
namespace themes\gentelella\assets;

class CustomAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@themes/gentelella';
	
	public $css = [
		'css/custom.css',
	];

	public $js = [
		'js/custom.js',
	];

	public $depends = [
		'yiister\gentelella\assets\Asset',
	];

	public $publishOptions = [
		'forceCopy' => YII_DEBUG? true: false,
		'except' => [
			'assets/',
			'components/',
			'layouts/',
		],
	];

}