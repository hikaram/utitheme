<?php if (isset($navigations['nodes'])) : ?>
	<ul class="dropdown-menu" role="menu">
		<?php foreach ($navigations['nodes'] as $navigation) : ?>
			<?php if ($navigation['is_visible_current']) : ?>
				<li data-f="sss" <?php echo (isset($navigation['nodes'])) ? 'class="dropdown-submenu"' : '' ?>>
					<? if ((!empty($navigation['secret_name'])) && (!empty($navigation['raw_name'])) && (!empty($navigation['file_ext']))) :?>
					<?= CHtml::image(MSmarty::attachment_get_file_name($navigation['secret_name'], $navigation['raw_name'], $navigation['file_ext'], '_menu', 'navigation_ico'), '', array('style' => 'display: inline-block; margin-bottom: 0;')); ?>
					<? else : ?>
					<? endif; ?>        
					<a href="<? if ((!Yii::app()->urlManager->_defaultLang) && ($navigation['object_alias'] != 'external_link')) : ?>/<?= Yii::app()->language ?><? endif; ?><?= $navigation['url'] ?>" target="<?= $navigation['target'] ?>"><?= CHtml::encode($navigation['title']) ?>
						<?php
						if (isset($navigation['nodes'])) {
							echo '<i class="fa fa-angle-right"></i>';
						}
						?>
					</a>
					<?= $this->render('level_3', array('navigations' => $navigation), true); ?>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>