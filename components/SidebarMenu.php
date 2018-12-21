<?php
namespace themes\gentelella\components;

class SidebarMenu extends \yii\base\Widget
{
    public $menuItems = [];

    public function run() {
        return $this->render('sidebar_menu');
    }
}