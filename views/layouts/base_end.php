    <?=$this->renderPartial('//layouts/control_footer')?>
	<?=$this->renderPartial('//layouts/control_js_after_footer')?>
	<? /* Вставка кода из AdminRegisterCode */?>
	<?$this->widget('application.modules.admin.modules.registercode.widgets.registercodewidget',
		array('position' => 'POS_END')
	)?>
</body>
<!-- END BODY -->
</html>