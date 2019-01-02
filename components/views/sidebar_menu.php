<?php /* sidebar menu */?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section active">
		<h3>General</h3>
		<?php echo \themes\gentelella\components\Menu::widget([
			'linkTemplate' => '<a href="{url}">{icon}{label}{badge}</a>',
			'items' => $this->context->menuItems,
		]);
		?>
	</div>
</div>
<?php /* end.sidebar menu */?>